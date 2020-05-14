<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NeighborhoodRequest;
use App;

class Address extends Controller
{
    public function init(){
        $routes= App\Route_Zone::all();
        return view('Address/add', compact('routes'));
    }
    public function save(NeighborhoodRequest $request)
    {
        $neighborhood= new App\Neighborhood;
        $neighborhood->name_neighborhood= $request->neighborhood;
        $neighborhood->start_time= $request->firstTime;
        $neighborhood->end_time= $request->lastTime;
        $neighborhood->route_zones_id=$request->selectRoute;
        $neighborhood->save();
        $request->session()->flash('mensaje','Nueva dirección registrada con exito');
        return back();
    }
    
}
