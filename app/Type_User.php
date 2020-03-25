<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_User extends Model
{
    protected $table='type_users';
    //funcion que contiene la relacion de la tabla Type_Users
    public function user(){
        return $this->hasMany('App\User');
    }
}
