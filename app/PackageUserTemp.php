<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PackageUserTemp extends Pivot
{
    protected $table = 'package_user_temps';
    protected $connection = 'mysql';
    public $incrementing = true;

    public function packageDetails(){
        return $this->belongsTo('App\EventPackage', 'package_id');
    }
}
