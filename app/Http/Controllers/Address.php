<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Address extends Controller
{
    public function init(){
        return view('Address/add');
    }
    public function save(Request $request)
    {
        $neighborhood= new App\Neighborhood;
        $neighborhood->name_neighborhood= $request->neighborhood;
        $neighborhood->start_time= $request->firstTime;
        $neighborhood->end_time= $request->lastTime;
        $neighborhood->save();
        $request->session()->flash('mensaje','Nueva dirección registrada con exito');
        return back();
    }
}
