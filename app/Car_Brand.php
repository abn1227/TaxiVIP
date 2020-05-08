<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_Brand extends Model
{
    protected $table='car_brands';
    public function car_model(){
        return $this->hasOne('App\Car_Model', 'car_brands_id');
    }

}