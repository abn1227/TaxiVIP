<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    public function shift(){
        return $this->hasMany('App\Shift', 'vehicles_id');
    }

    public function taxiDriver(){
        return $this->belongsTo('App\Taxi_Driver','taxi_drivers_id');
    }

    public function carBrands(){
        return $this->belongs('App\Car_Brand', 'car_brands_id');
    }// este es el cambio
}
