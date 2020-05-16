<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function taxiDriver(){
        return $this->belongsTo('App\Taxi_Driver', 'taxi_drivers_id');
    }

    public function client(){
        return $this->belongsTo('App\Client', 'clients_id');
    }
    

}
