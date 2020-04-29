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


    public function detailVehicle($id){

        $vehicle = App\Vehicle::findOrFail($id);

    return view('vehicles.detailVehicles', compact('vehicle'));


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
       

        $autoNuevo = new App\Vehicle;
        $autoNuevo->car_brand = $request->carBrand;
        $autoNuevo->model = $request->model; 
        $autoNuevo->color = $request->color; 
        $autoNuevo->license_plate = $request->licensePlate;
        $autoNuevo->active = '1';
        $autoNuevo->taxi_drivers_id = $id;
        $autoNuevo->save();
       // return back()->with('exito', 'Registro agregado');
       return;
    }

    public function deleteVehicle($id){

        $deletVehicle = App\Vehicle::FindOrfail($id);
        $deletVehicle->delete();

        return back();
    }

    public function upadateVehicles($id){

    

        $vehicle = App\Vehicle::findOrFail($id);

           return view('vehicles.updateVehicles', compact('vehicle'));
    }

public function newVehicle(Request $request, $id){
       
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
