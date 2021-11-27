<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPackage extends Model
{
    protected $fillable = ['available_tickets'];
    protected $connection = 'mysql';

    public function event_table(){
        return $this->belongsTo('App\Event', 'event_id');
    }

    public function userTemp(){
        return $this->belongsToMany('App\User', 'package_user_temps', 'package_id', 'user_id')->withPivot(['quantity', 'date'])->withTimestamps();
    }

}
