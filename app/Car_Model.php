<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_Model extends Model
{
    protected $table='car_models';
    public function car_brand(){
        return $this->belongsTo('App\Car_Brand', 'car_brands_id');
    }

    //colocar relacion de uno a uno aqui va el hasAlgo con vhiculo
    public function vehicle(){
        return $this->belongsTo('App\Vehicle', 'car_models_id');
    }
}
