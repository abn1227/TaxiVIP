<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\Http\Controllers\VehicleController;
use App\Http\Requests\VehicleRequest;
use App\Http\Requests\TaxiDriverRequest;

class TaxiDriver extends Controller
{
    //--------------------------------------------------------------------------------------
    // Crear un nuevo taxista y su respectivo vehiculo desde la funcion de agregar empleado
    //--------------------------------------------------------------------------------------
    public function createTaxiDriving(TaxiDriverRequest $request){
        //--------------------------------------------------------------------------------------
        //Registro del taxista
        //--------------------------------------------------------------------------------------
        $taxiDrivers= new App\Taxi_Driver;
        $taxiDrivers->persons_id=$request->inputIdPerson;
        $taxiDrivers->mileage=0;
        $taxiDrivers->percentage=$request->inputPercentaje;
        $taxiDrivers->cut_date=$request->cut;
        $taxiDrivers->current_driver_license=$request->inputCurrentDriverLicense;
        $taxiDrivers->status='1';
        $taxiDrivers->save();
        $id= $taxiDrivers->id;
        //----------------------------------------------------------------------------------
        //Desplegar los modelos disponibles
        //----------------------------------------------------------------------------------
        $model = new CarModel;
        $models=$model->getCarModel();
        //----------------------------------------------------------------------------------
        //Agregar Nuevo Vehiculo
        //----------------------------------------------------------------------------------
        $newvehicle = new App\Vehicle;
        $newvehicle->car_models_id = $request->model; 
        $newvehicle->color = $request->color; 
        $newvehicle->license_plate = $request->licensePlate;
        $newvehicle->active = '1';
        $newvehicle->status = '1';
        $newvehicle->taxi_drivers_id = $id;
        $newvehicle->save();
        //----------------------------------------------------------------------------------
        //Estatus del vehiculo
        //----------------------------------------------------------------------------------
        $vehicle = new VehicleController;
        $vehicle->status($newvehicle->id,$id);
        session()->forget('id');
        $request->session()->flash('mensaje','Taxista Agregado');
        return view('user.createUser');
    }

   //--------------------------------------------------------------------------------------
   //Mostrar todos los taxistas 
   //--------------------------------------------------------------------------------------
    public function showAll()
    { 
        //
        $taxiDrivers= App\Taxi_Driver::paginate(7);
        return view('user.taxiDriver',compact('taxiDrivers'));
    }
    //--------------------------------------------------------------------------------------
    //Retorna los datos de un determinado taxista al formulario donde se puede modificar 
    // los datos del taxista
    //--------------------------------------------------------------------------------------
    public function editTaxiDriver($id)
    {
        //
        $taxiDriver= App\Taxi_Driver::findOrFail($id);
        $user= App\User::findOrFail($taxiDriver->persons_id);
        $vehicle=DB::table('vehicles')->where('taxi_drivers_id',$taxiDriver->id)->get();
        $model = new CarModel;
        $vehicleAct = new VehicleController;
        $models=$model->getCarModel();
        $vehicleActivate=$vehicleAct->getVehicle($taxiDriver->id);
        return view('user.editTaxiDriver',compact('taxiDriver','user','vehicle','models','vehicleActivate'));
    }
    //--------------------------------------------------------------------------------------
    //Envia los datos del taxista a la pantalla donde se muestran los detalle del taxista
    //--------------------------------------------------------------------------------------
    public function showTaxiDriver($id)
    {
        $taxiDriver= App\Taxi_Driver::findOrFail($id);
        $user= App\User::findOrFail($taxiDriver->persons_id);
        $vehicle=DB::table('vehicles')->where('taxi_drivers_id',$taxiDriver->id)->first();
        $vehicleAct = new VehicleController;
        $vehicleActivate=$vehicleAct->getVehicle($taxiDriver->id);
        return view('user.detailTaxiDriver',compact('taxiDriver','user','vehicle','vehicleActivate'));
    }
    //--------------------------------------------------------------------------------------
    //Funcion que actualiza los datos del taxista
    //--------------------------------------------------------------------------------------

    public function updateTaxiDriver(TaxiDriverRequest $request, $id)
    {
        $taxiDriver= App\Taxi_Driver::findOrFail($id);
        $personUpdate= App\Person::findOrFail($taxiDriver->persons_id);
        $user= App\User::findOrFail($taxiDriver->persons_id);       
        $vehicle =new VehicleController;
        $vehicle->status($request->selectVehicle,$id);   
        $vehicleActivate=$vehicle->getVehicle($id);
            $taxiDriver->percentage=$request->inputTaxiDriverPercentage;
            $taxiDriver->cut_date=$request->cut;
            $taxiDriver->current_driver_license =$request->inputTaxiDriverDate;
            $taxiDriver->save();
            $personUpdate->name = $request->inputTaxiDriverName;
            $personUpdate->identification = $request->inputTaxiDriverIdentification;
            $personUpdate->mobile = $request->inputTaxiDriverMobile;    
            $personUpdate->save();
            $user->save();
            return view('user.detailTaxiDriver',compact('taxiDriver','user','vehicleActivate'));
    }
     //--------------------------------------------------------------------------------------
    //Funcion que busca un taxista
    //--------------------------------------------------------------------------------------
   
}
