<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route_Zone extends Model
{
    protected $table='route_zones';

    public function Neighborhood(){
        return $this->hasMany('App\Neighborhood', 'route_zones_id');
    }

    //1m
    public function taxiDriver(){
        return $this->hasMany('App\Taxi_Driver', 'route_zones_id');
    }
}
