<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class Route extends Controller
{
    public function init()
    {
        return view('Address/createRoute');
    }

    public function save(Request $request)
    {
        $route= new App\Route_Zone;
        $route->name=$request->route;
        $request->session()->flash('mensaje','Ruta guardada correctamente');
        $route->save();
        return back();
    }
    public function getRoute()
    {
        $routes=App\Route_Zone::All();
        return $routes;
    }
    
}
