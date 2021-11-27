<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTransaction extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';

    public function transactionDetails(){
        return $this->belongsTo('App\EventTicket', 'booking_id', 'booking_id');
    }
}
