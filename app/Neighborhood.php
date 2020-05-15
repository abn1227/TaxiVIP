<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    protected $table = 'neighborhoods';

    //1m
    public function order(){
        return $this->hasMany('App\Order');
    }

    //nm
    public function routeZone(){
        return $this->belongsToMany('App\Route_Zone') ;
    }
}
