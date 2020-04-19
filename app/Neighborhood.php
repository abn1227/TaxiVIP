<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    protected $table = 'neighborhoods';

    public function schedule(){
        return $this->belongsTo('App\Schedule','schedule_id');
    }

    public function order(){
        return $this->hasMany('App\Order');
    }
}
