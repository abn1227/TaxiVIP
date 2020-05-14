<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    protected $table = 'neighborhoods';

    public function order(){
        return $this->hasMany('App\Order');
    }

    public function routeZone(){
        return $this->belongsTo('App\Route_Zone', 'route_zones_id') ;
    }
}
