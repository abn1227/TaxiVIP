<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function shift(){
        return $this->hasMany('App\Shift', 'states_id');
    }
}
