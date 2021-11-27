<?php

namespace App\Http\Controllers;

use auth;
use App\EventTicket;
use Illuminate\Http\Request;
use App\Jobs\SendConfirmEmailJob;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
       $bookings = EventTicket::with('transaction')->with('packages')->where('user_id', auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);
       return view('events.myticket', compact('bookings'));
    }






    //TEST
    public function ticket(){
        $booking = EventTicket::with('transaction')->with('packages')->where('booking_id', 'D3QKEYZFKB')->first();
        return view('events.pdf.ticket', compact('booking'));
    }

    public function mail(){
        $booking = EventTicket::with('transaction')->with('packages')->where('booking_id', 'D3QKEYZFKB')->first();
        $details = ['email' => 'narzaryarjun@gmail.com'];
        // SendConfirmEmailJob::dispatch($details,$booking);
        return view('emails.event.custom', compact('booking'));
    }
    //TEST END
}
