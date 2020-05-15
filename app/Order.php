<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function vehicle(){
        return $this->belongsTo('App\Taxi_Drivers', 'taxi_drivers_id');
    }

    public function client(){
        return $this->belongsTo('App\Client', 'clients_id');
    }

}
