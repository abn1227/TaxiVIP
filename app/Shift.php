<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shifts';

    public function state(){
        return $this->belongsTo('App\State','states_id');
    }

    public function vehicle(){
        return $this->belongsTo('App\Vehicle', 'vehicles_id');
    }
}
