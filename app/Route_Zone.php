<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route_Zone extends Model
{
    public function neighborhoods(){
        return $this->hasMany('App\Neighborhoods', 'route_zones_id');
    }

    public function taxiDriver(){
        return $this->hasMany('App\Taxi_Driver', 'route_zones_id');
    }
}
