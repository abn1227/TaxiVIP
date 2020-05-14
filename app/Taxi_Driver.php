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

    public function vehicle(){
        return $this->hasMany('App\Vehicle', 'taxi_drivers_id');
    }

    public function order(){
        return $this->hasMany('App\Order','taxi_drivers_id');
    }

    public function cut(){
        return $this->hasMany('App\Cut','taxi_drivers_id');
    }

    public function routeZone(){
        return $this->belongsTo('App\Route_Zone', 'route_zones_id');
    }
}
