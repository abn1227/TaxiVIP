<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    protected $table = 'neighborhoods';

    //nm
    public function routeZone(){
        return $this->belongsTo('App\Route_Zone', 'route_zones_id') ;
    }
}
