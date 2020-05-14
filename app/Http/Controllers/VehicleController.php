<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\VehicleRequest;
use App;

class VehicleController extends Controller
{
    

    //--------------------------------------------------------------------------------------
    //Este metodo es para insertar vehiculo desde la vista en donde se muestra la 
    //informacion del taxista
    //--------------------------------------------------------------------------------------
    public function newVehicle(VehicleRequest  $request,$id)
    {
       $this->insertVehicles($request, $id);
       session(['mensaje'=>'Vehiculo ingresado a la base']);
        return back();
    }
//--------------------------------------------------------------------------------------
//Inserta un nuevo vehiculo, esta funcion es llamada desde la vista de editar 
//taxista, que tambien permite agregar un vehiculo adicional al taxista
//--------------------------------------------------------------------------------------

    public function insertVehicles(VehicleRequest $request, $id)
    {
    
        $newvehicle = new App\Vehicle;
        $newvehicle->car_models_id = $request->model; 
        $newvehicle->color = $request->color; 
        $newvehicle->license_plate = $request->licensePlate;
        $newvehicle->active = '1';
        $newvehicle->status = '1';
        $newvehicle->taxi_drivers_id = $id;
        $newvehicle->save();
        $this->status($newvehicle->id,$id);


       return;
    }
//--------------------------------------------------------------------------------------
//Actualiza la informacion de vehiculo en uso
//--------------------------------------------------------------------------------------


    public function updateVehicles(VehicleRequest $request,$id){
        $vehicle = App\Vehicle::findOrFail($id);
        $vehicle->car_models_id=$request->model;
        $vehicle->license_plate=$request->licensePlate;
        $vehicle->color=$request->color;
        $vehicle->save();
        return back();
    }
//--------------------------------------------------------------------------------------
//Obtiene la informacion del vehiculo que se encuentra activo o en uso    
//--------------------------------------------------------------------------------------

public function getVehicle($id)
{
    $vehicle=DB::table('vehicles')->where([
        ['taxi_drivers_id',$id],
        ['active','1']
    ])->first();
    return $vehicle;
}
//--------------------------------------------------------------------------------------
//Funcion para actualizar el campos activo de la tabla vehiculo
//--------------------------------------------------------------------------------------

public function status($id,$taxiDriverId)
{
    DB::table('vehicles')->where([['active','1'],['taxi_drivers_id',$taxiDriverId]])->update(['active'=>'0']);
    DB::table('vehicles')->where('id',$id)->update(['active'=>'1']);
    return;
}
}
