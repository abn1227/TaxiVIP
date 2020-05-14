<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    public function taxiDriver(){
        return $this->belongsTo('App\Taxi_Driver','taxi_drivers_id');
    }

    public function carModel(){
        return $this->belongs('App\Car_Model', 'car_models_id');
    }// este es el cambio
}
