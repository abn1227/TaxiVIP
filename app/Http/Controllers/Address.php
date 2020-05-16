<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NeighborhoodRequest;
use Carbon\Carbon; 
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
    public function availability(Request $request)
    {
        $origin=App\Neighborhood::findOrfail($request->origin);
        $destination=App\Neighborhood::findOrfail($request->destination);
        
            date_default_timezone_set('America/Tegucigalpa');
            $now= Carbon::now()->toTimeString();
            // dd($now,$destination->start_time,$destination->end_time);
            if (($now>=$origin->start_time) && ($now<$origin->end_time)) {
                if ($now>=$destination->start_time && $now<$destination->end_time) {

                     //Verificar si existe un taxista disponible en esta ruta
                        $taxiDrivers=App\Taxi_Driver::Where([
                            ['route_zones_id','=',$origin->route_zones_id],
                            ['status','=','1']
                        ])->orderBy('mileage','asc')
                        ->get();
                        // count($taxiDrivers)>=1
                        if (count($taxiDrivers)>=1) {
                            $request->session()->flash('mensaje','Hay taxistas disponibles');
                            $neighborhood=  App\Neighborhood::All();
                            return view('Address/order',compact('neighborhood','taxiDrivers'));
                        }else {
                            $request->session()->flash('msj','No hay taxistas disponibles');
                            return back();
                        }
                       
                }
                else {
                    $request->session()->flash('msj','No hay acceso a la colonia destino en este horario');
                    return back();
                }
            }else {
                $request->session()->flash('msj','No hay acceso a la colonia de origen en este horario');
                return back();
            }
       
    }
    
}
