<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class Order extends Controller
{
    public function init(){
        $neighborhood=  App\Neighborhood::All();
        
        return view('Address/order',compact('neighborhood'));
    }
}
