<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_Model extends Model
{
    public function car_brand(){
        return $this->hasMany('App\Car_Brand', 'car_brands_id');
    }

    //colocar relacion de uno a uno aqui va el hasAlgo con vhiculo
    public function vehicle(){
        return $this->hasOne('App\Car_Brand', 'car_brands_id');
    }
}
