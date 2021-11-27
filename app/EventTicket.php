<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';

    public function transaction(){
        return $this->hasOne('App\EventTransaction', 'booking_id', 'booking_id');
    }

    public function packages(){
        return $this->hasMany('App\EventTicketPackage', 'booking_id', 'booking_id');
    }

    public function eventDetail(){
        return $this->belongsTo('App\Event', 'event_id');
    }
}
