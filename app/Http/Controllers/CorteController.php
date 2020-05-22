<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Cut;


class CorteController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function init()
    {
        $status = '1';
        $taxiDriver= App\Taxi_Driver::where('status','=', '1')->paginate(5);
        
        $taxiDriverid = $taxiDriver;
        $corte = App\Cut::where('taxi_drivers_id','=', $taxiDriverid)->paginate(5);
        return view('cut.cut', compact('taxiDriver','corte'));
        /*$taxiDriver= App\Taxi_Driver::where('status', $status)->paginate(5);
        return view('cut.cut', compact('taxiDriver'));*/
        //$cut= App\Cut::where('status', $status)->paginate(5);   
        //return view('cut.cut', compact('cut'));
    }

    public function doCut(Request $request, $id){
        $cutUpdate = App\Cut::findOrFail($id);
        $cutUpdate->name = $request->inputName;
        $cutUpdate->identification = $request->inputIdentification;
        $cutUpdate->mobile = $request->inputMobile;    
        $cutUpdate->save();

         return back()->with('mensaje', 'Corte realizado con exito');
    }

}
