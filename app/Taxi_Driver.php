<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi_Driver extends Model
{
    protected $table='taxi_drivers';
    //funcion que contiene la relacion del taxista con persona
    public function person()
    {
        return $this->belongsTo('App\Person','persons_id');
    }
}
