<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $connection = 'mysql';

    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }

    public function category()
    {
        return $this->belongsTo('App\EventCategory','eventcategory_id');
    }

    public function packages(){
        return $this->hasMany('App\EventPackage', 'event_id');
    }
    public function ticketSold(){
        return $this->hasMany('App\EventTicket', 'event_id');
    }
}
