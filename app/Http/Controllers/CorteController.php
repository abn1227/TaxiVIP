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
        $taxiDriver= App\Taxi_Driver::where('status','=', '1')
                        ->paginate(5);
        
        $taxiDriverid = $taxiDriver;
        $condition = ['taxi_drivers_id' => $taxiDriverid, 'status' => $status];
        $corte = App\Cut::where([['taxi_drivers_id','=', $taxiDriverid],['status','=', '1']]/*'taxi_drivers_id','=', $taxiDriverid*/)->
                        /*->where('status','=', '1')->*/paginate(5);
        
        $resultado = 3;//$taxiDriver->percentage;
        return view('cut.cut', compact('taxiDriver','corte'));
        /*$taxiDriver= App\Taxi_Driver::where('status', $status)->paginate(5);
        return view('cut.cut', compact('taxiDriver'));*/
        //$cut= App\Cut::where('status', $status)->paginate(5);   
        //return view('cut.cut', compact('cut'));
    }

    public function doCut( $id){
        //hacer aca el update del registro actual
        //hacer los update en las tablas que sean necesarias, cambiar a 0 el accrued_payment

        $cutUpdate = App\Cut::findOrFail($id);
        $cutUpdate->payment = '0';
        $cutUpdate->status = '0';
        $cutUpdate->save();

         return back()->with('mensaje', 'Corte realizado con exito');
    }

}
