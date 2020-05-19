<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RouteRequest;
use App;
class Route extends Controller
{
    public function init()
    {
        return view('address/createRoute');
    }

    public function save(RouteRequest $request)
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

    public function showRoute()
    {
        $routes=App\Route_zone::All();
        return view('address/routes', compact('routes'));
    }
    
}
