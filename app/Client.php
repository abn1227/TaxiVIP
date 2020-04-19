<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //funcione que contiene la rela relacion de la tabla Clients
    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function order(){
        return $this->hasMany('App\Order','clients_id');
    }
}
