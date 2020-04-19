<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table='persons';
    
   // Aqui se encuentran las funciones que contiene las relaciones de la tabla persona
    
    public function user(){
        return $this->hasOne('App\User','persons_id');
    }
    public function client()
    {
        return $this->hasOne('App\Client','persons_id');
    }
    public function taxiDriver()
    {
        return $this->hasOne('App\Taxi_Driver','persons_id');
    }
}
