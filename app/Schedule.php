<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    public function neighborhood(){
        return $this->hasMany('App\Neighborhood','schedule_id');
    }
}
