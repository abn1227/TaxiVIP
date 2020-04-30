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
    public function create()
    {
        return view('vehicles.createVehicles');

    }

    public function insertVehicles(Request $request, $id)
    {

    //   $request->validate([
    //     'id' => 'required',
    //     'cardBrand' => 'required',
    //     'model' => 'required',
    //     'licensePlate' => 'required',
    //     'active' => 'required',
    //     'taxyDrivers_id' => 'required'
    //      ]);
       

        $newvehicle = new App\Vehicle;
        $newvehicle->car_brand = $request->carBrand;
        $newvehicle->model = $request->model; 
        $newvehicle->color = $request->color; 
        $newvehicle->license_plate = $request->licensePlate;
        $newvehicle->active = '1';
        $newvehicle->taxi_drivers_id = $id;
        $newvehicle->save();
       // return back()->with('exito', 'Registro agregado');
       return;
    }

    public function deleteVehicle($id){

        $deletVehicle = App\Vehicle::FindOrfail($id);
        $deletVehicle->delete();
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
