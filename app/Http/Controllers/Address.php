<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Address extends Controller
{
    public function init(){
        return view('Address/add');
    }

}
