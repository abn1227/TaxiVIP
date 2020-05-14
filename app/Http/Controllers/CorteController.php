<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\Http\Controllers\VehicleController;


class CorteController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function init()
    {
        //logica de retorno de datos a la tabla
        /*$brand= new App\Car_Brand;
        $brand->name=$request->inputBrandName;
        $brand->save();
        $request->session()->flash('mensaje','Marca agregada con exito');*/

        $taxiDriver= App\Taxi_Driver::paginate(5); //where('status', '1'); //all()->paginate(5);
        /*$user= App\User::findOrFail($taxiDriver->persons_id);
        $vehicle=DB::table('vehicles')->where('taxi_drivers_id',$taxiDriver->id)->first();
        $vehicleAct = new VehicleController;
        $vehicleActivate=$vehicleAct->getVehicle($taxiDriver->id);*/
        return view('cut.cut', compact('taxiDriver'));//,'user','vehicle','vehicleActivate'));
    }

}
