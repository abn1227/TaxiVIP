<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route_Zone extends Model
{
    protected $table='route_zones';
    
    //nm
    public function neighborhoods(){
        return $this->belongsToMany('App\Neighborhoods');
    }
    //1m
    public function taxiDriver(){
        return $this->hasMany('App\Taxi_Driver', 'route_zones_id');
    }
}
