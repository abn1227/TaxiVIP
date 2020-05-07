<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cut extends Model
{
    protected $table = 'cut';

    public function taxi_driver()
    {
        return $this->belongsTo('App\Taxi_Driver','taxi_drivers_id');
    }
}
