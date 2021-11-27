<?php

namespace App\Http\Controllers;

use App\City;
use App\Event;
use Auth;
use App\EventCategory;
use App\EventPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function index(){
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    public function EventDetails($slug) {
        $event = Event::where('slug', $slug)->first();
        $eventpacs = EventPackage::where('event_id', $event->id)->where('status', 1)->get();
        return view('events.details', compact('event', 'eventpacs'));
    }

    public function Book(Request $request){
        $this->validate($request, [
            // 'time'     => 'required',
            'date'     => 'required|date',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'numeric',
            'package'  => 'required|array|min:1',
            'package.*'  => 'numeric',
            'e_id' => 'required|string',
            ]);


             //Check if it can decrypt
            try {
                $event_id = \decrypt($request->e_id);
            } catch (DecryptException $e) {
                return back()->with('error', 'Currently we could not process your request please try after 5 minutes.');
            }
            //Check if packets are selected or not
            $validate = 0;
            foreach($request->quantity as $num => $qty){
                if($qty > 0){
                    $validate = 1;
                break;
            }
        }

        //If packages selected
        if($validate == 1){
            $event = Event::with('packages')->where('id', $event_id)->first();

            //Check for event
            if($event){
                $book = [];
                foreach($request->quantity as $num => $qty){
                    $pac_id = $request->package[$num];
                    $qty = $request->quantity[$num];
                    if($this->check_pac($event, $pac_id, $qty)){
                        $data = array(
                            'pac_id' => $pac_id,
                            'qty' => $qty,
                            );

                        array_push($book, $data);
                    }
                }

                //If no packets found for selected event
                if(empty($book)){
                    return back()->with('error', 'Please select at least 1 ticket.');
                }


                $date = $request->date;

                //Encrypt datas
                $enc_book = \encrypt($book);
                $enc_date = \encrypt($date);

                $request->session()->put('booked_date', $enc_date);
                $request->session()->put('booked', $enc_book);
                $request->session()->put('event_id', \encrypt($event_id));

                return redirect()->route('book.index');
            }
            else{

                //Return if no event found
                return back()->with('error', 'Please refresh the and try again');
            }
        }
        else{

            //Return if no package selected
            return back()->with('error', 'You must add at least 1 ticket.');
        }

    }

    //Check for event package
    public function check_pac($event, $pac_id, $qty){
        $count = 0;
        foreach($event->packages as $pac){
            if($pac->id == $pac_id && $pac->available_tickets >= $qty){
                $count = 1;
            }
        }

        if($count == 1)
            return true;
        else
            return false;
    }

    //Search result for event search
    public function search(Request $request){
        $this->validate($request, [
            'event_name' => 'required|string',
        ]);
        $name = $request->input('event_name');
        $events = Event::where('status', 1)->where('title', 'LIKE', '%'.$name.'%')
                          ->orwhereHas('city',  function($city) use ($name) {
                                  $city->where('name', 'LIKE', '%'.$name.'%');
                          })->where('status', 1)->take(20)->get();

        // return $events;
        return view('events.search_result', compact('events', 'name'));
    }
}
