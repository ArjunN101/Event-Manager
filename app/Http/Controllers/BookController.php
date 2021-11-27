<?php

namespace App\Http\Controllers;

use PDF;
use auth;
use App\User;
use App\Event;
use Carbon\Carbon;
use App\EventTicket;
use App\EventPackage;
use App\PackageUserTemp;
use App\EventTransaction;
use App\EventTicketPackage;
use Illuminate\Http\Request;
use App\Mail\TicketConfirmMail;
use App\Jobs\SendConfirmEmailJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if(!$request->session()->get('booked')){
            return back();
        }
        //Check if it can decrypt
        try {
            $booked = \decrypt($request->session()->get('booked'));
            $date = \decrypt($request->session()->get('booked_date'));
            $event_id = \decrypt($request->session()->get('event_id'));
        } catch (DecryptException $e) {
            return back()->with('error', 'Currently we could not process your request please try after 5 minutes.');
        }

        $checkout_data = [];
        $total_amount = 0;
        $total_tax = 0;


        //get User
        $user = User::where('id', auth::user()->id)->first();

        //Delete old data if exists
        $user->packagesTemp()->detach();

        foreach($booked as $book){
            $pac_id = $book['pac_id'];
            $pac = EventPackage::findOrFail($pac_id);

            $temp['title'] = $pac->title;
            $temp['description'] = $pac->description;
            $temp['qty'] = $book['qty'];
            $temp['price'] = $pac->amount;
            $temp['sub_total'] = $pac->amount * $book['qty'];

            $total_amount = $total_amount + $temp['sub_total'];
            $total_tax = $total_tax + ($pac->tax * $book['qty']);
            array_push($checkout_data, $temp);

            //Insert into temporary packageuser table
            $user->packagesTemp()->attach($pac_id, [
                                        'quantity' => $book['qty'],
                                        'date'     => $date,
                                        ]);
        }

        $total_amount = $total_amount + $total_tax;
        $event = Event::find($event_id);

        return view('events.booking', compact('event', 'checkout_data', 'total_amount', 'date', 'total_tax'));
    }

    public function checkout(Request $request){
        $this->validate($request, [
            'name' => 'required|string|regex:/^[a-zA-Z ]*$/',
            'phone' => 'required|numeric|digits:10',
            'email' => 'nullable|email',
            'terms' => 'required|in:1',
        ],[
            'name.regex' => 'Only alphabets and space allowed.'
        ]);

        $booking_id = $this->getbooking_id();

        //Get selected packages from temp table
        $selected_packages = PackageUserTemp::where('user_id', auth::user()->id)->with('packageDetails')->get();
        // return $selected_packages;

        $total_amount = 0;
        $total_tax = 0;
        // $check_pac = [];
        // $check_qty = [];

        try{

            DB::beginTransaction();

            //Check added qty exist or not
            foreach($selected_packages as $selected){
                $event_id = $selected->packageDetails->event_id;
                $event_date = $selected->date;
                $qty = $selected ->quantity;
                if($qty != 0){
                    if($selected->packageDetails->available_tickets >= $qty){
                        $total_amount = $total_amount + ($selected->packageDetails->amount * $qty);
                        $total_tax    = $total_tax + ($selected->packageDetails->tax * $qty);
                        $available_tic = $selected->packageDetails->available_tickets - $qty;

                        //Add to EventTicketPackage table
                        EventTicketPackage::create([
                            'booking_id' => $booking_id,
                            'package_id' => $selected->package_id,
                            'quantity'   => $qty,
                            ]);

                        //Update Event Package table
                        EventPackage::where('id', $selected->package_id)->update(['available_tickets' => $available_tic]);
                    }else{
                        DB::rollBack();
                        return redirect('/events')->with('error', 'Please try again.');
                        break;
                    }
                }
            }

            $total_payable = $total_amount + $total_tax;

            //Filename for ticket
            $filename = $booking_id . time() . '.pdf';

            //Add Details to  Event Ticket Table
            $booking = EventTicket::create([
                        'booking_id' => $booking_id,
                        'event_id'   => $event_id,
                        'user_id'    => auth::user()->id,
                        'name'       => $request->input('name'),
                        'phone'      => $request->input('phone'),
                        'email'      => $request->input('email'),
                        'date'       => $event_date,
                        'ticket'     => $filename,
                    ]);

            //Add Details to Event transaction table
            EventTransaction::create([
                        'booking_id'   => $booking_id,
                        'amount'       => $total_amount,
                        'total_amount' => $total_payable,
                        'convenience_fee' => $total_tax,
                    ]);

            //Delete Temp packages
            $user = User::where('id', auth::user()->id)->first();
            //Delete old data if exists
            $user->packagesTemp()->detach();

            //Flash session
            $request->session()->forget(['booked_date', 'booked', 'event_id']);



            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
            return redirect('/events')->with('error', 'Please try again.');
        }

        //Generate Ticket and save
        $data['booking'] = $booking;
        $pdf = PDF::loadView('events.pdf.ticket', $data);
        $path = public_path('tickets');
        Storage::put('public/tickets/'.$filename, $pdf->output());

        //Sent mail
        if($booking->email != null){
            $email = $booking->email;
        }else{
            $email = auth::user()->email;
        }
        SendConfirmEmailJob::dispatch($email,$booking);

        //Send sms
        $mobile = $request->input('phone');
        $name = $request->input('name');
        $time = Carbon::parse($booking->eventDetail->start_date_time)->format('h:i a');
        $ticket_enc = \encrypt($booking->ticket);
        $message = 'Hello '.$name.'Thank You for booking with us. Your ticket has been successfully booked with booking ID - '.$booking_id.' Event Details - Title - '. $booking->eventDetail->title. ', date - '. $booking->date .', Time - '. $time.'You can download your ticket here: https://geThrills/downloadTicket/'. $ticket_enc;

        // return $message;

        $this->sendSms($mobile, $message);

        return view('events.booking-successful', compact('booking_id'));

    }

    //Get unique booking id
    public function getbooking_id(){
        $uuid = strtoupper(str_random(10));
        $data = EventTicket::where('booking_id', $uuid)->first();

        //do query till its unique
        while($data){
            $uuid = strtoupper(str_random(10));
        }
        return $uuid;
    }


    //Send sms
    public function sendSms($message, $mobile)
    {
        $user 		= 'demoiit';
        $password	= 'good123';
        $senderid	= 'ICLICK';
        $message 	= urlencode($message);
        $mobileno			= '91' . $mobile;

        $url 		= 'http://t.instaclicksms.in/sendsms.jsp?user='.$user.'&password='.$password.'&senderid='.$senderid.'&mobiles='.$mobileno.'&sms='.$message;
        $ch 		= curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ch     	= curl_exec($ch);

        // print_r($ch);
        return true;
    }

    public function sendSms1(){
        $xml_data = '<?xml version="1.0"?>

        <smslist>
            <sms>
                <user>demoiit</user>
                <password>good123</password>
                <message>SMS TEST FROM XML</message>
                <mobiles>7002899737</mobiles>
                <senderid>ICLICK</senderid>
            </sms>
        </smslist>';

        $URL = "http://t.instaclicksms.in/sendsms.jsp?";

        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);

        curl_close($ch);

        print_r($output);
    }
}
