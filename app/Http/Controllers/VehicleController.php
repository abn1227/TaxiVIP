<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = App\Vehicle::paginate(10);
        return view('vehicles.showVehicles', compact('vehicles'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Este metodo es para insertar vehiculo desde la vista en donde se muestra la informacion del taxista
    public function newVehicle(Request $request,$id)
    {
       $this->insertVehicles($request, $id);
       session(['mensaje'=>'Vehiculo ingresado a la base']);
        return back();
    }

    public function insertVehicles(Request $request, $id)
    {
    
        $newvehicle = new App\Vehicle;
        $newvehicle->car_brand = $request->carBrand;
        $newvehicle->model = $request->model; 
        $newvehicle->color = $request->color; 
        $newvehicle->license_plate = $request->licensePlate;
        $newvehicle->active = '1';
        $newvehicle->taxi_drivers_id = $id;
        $newvehicle->save();
       return;
    }

    public function deleteVehicle($id){

        App\Vehicle::destroy($id);

        return back();
    }

    public function updateVehicles(Request $request,$id){
        $vehicle = App\Vehicle::findOrFail($id);
        $vehicle->car_brand=$request->carBrand;
        $vehicle->model=$request->model;
        $vehicle->license_plate=$request->licensePlate;
        $vehicle->active=$request->status;
        $vehicle->save();
        return back();
    }

public function updateVehicle(Request $request, $id){
       
       $request->validate([
        'id' => 'required',
        'cardBrand' => 'required',
        'model' => 'required',
        'licensePlate' => 'required',
        'active' => 'required',
        'taxyDrivers_id' => 'required'
         ]);
        

         $vehicleUpdate = App\Vehicle::FindOrfail($id);
         $vehicleUpdate->id = $request->id;
         $vehicleUpdate->card_brand = $request->cardBrand;
         $vehicleUpdate->model = $request->model;
         $vehicleUpdate->color = $request->color;
         $vehicleUpdate->license_plate = $request->licensePlate;
         $vehicleUpdate->active = $request->active;
         $vehicleUpdate->taxy_Drivers_id = $id;
         $vehicleUpdate->save();
         return back()->with('exito', 'Registro actualizado');
        }

}
