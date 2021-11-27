<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicketPackage extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';

    public function packageDetails(){
        return $this->belongsTo('App\EventPackage', 'package_id');
    }

    public function ticketDetails(){
        return $this->belongsTo('App\EventTicket', 'bookibg_id', 'booking_id');
    }
}
