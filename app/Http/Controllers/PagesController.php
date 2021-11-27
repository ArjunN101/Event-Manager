<?php

namespace App\Http\Controllers;

use App\Carousel;
use App\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  

    public function index(){
      
        $carousels = Carousel::all();
        $events = Event::latest()->get()->take(4);
        return view('index', compact('carousels', 'events'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);

        $name = $request->input('search');

        
        $events = Event::where('status', 1)->where('title', 'LIKE', '%'.$name.'%')
                          ->orwhereHas('city',  function($city) use ($name) {
                                  $city->where('name', 'LIKE', '%'.$name.'%');
                          })->where('status', 1)->take(4)->get();

    
        return view('search', compact('events', 'name'));
    }
}
