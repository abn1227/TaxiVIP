<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Cut;
use Carbon\Carbon;


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
        $corte = App\Cut::where([['taxi_drivers_id','=', $taxiDriverid],['status','=', '1']]);
        return view('cut.cut', compact('taxiDriver','corte'));
    }

    public function doCut( $id){
        //hacer aca el update del registro actual
        //hacer los update en las tablas que sean necesarias, cambiar a 0 el accrued_payment
        $userSelect = App\Cut::findOrFail($id);//id del conductor
        

        //crear el nuevo corte

        $cut = new App\Cut;
        $pay = 0;
        $date = new \DateTime();
        $cut->payment = $pay;
        $cut->cut_date = $date;
        $cut->status = '1';
        $cut->penalty_fee = '0';
        $cut->taxi_drivers_id = $userSelect->taxi_drivers_id;
        $cut->save();

        //obtener valores de la tabla taxi_drivers
        $taxiDriver = App\Taxi_Driver::findOrFail($userSelect->taxi_drivers_id);
        
        $porcentage = $taxiDriver->percentage;
        $gananciacon = $taxiDriver->accrued_payments;
        if($porcentage < 10){
            $porcentage = '0'.$porcentage;
        }

        //verificando la diferencia de dias
        $cut_day = Carbon::createFromDate($userSelect->created_at);
        $today = Carbon::now();

        $penalty_fee = ($cut_day->diffInDays($now))*100;
        
        //guardar el cobro
        $paym = ($porcentage*$gananciacon)/100;
        $paym = round($paym);

        

        //actualizar datos del corte
        $cutUpdate = App\Cut::findOrFail($id);
        $cutUpdate->payment = $paym;
        $cutUpdate->status = '0';
        $cut->penalty_fee = $penalty_fee;
        $cutUpdate->save();

        //update a accrued_payment el valor se obtiene arriba
        $taxiDriver->accrued_payments = '0';
        $taxiDriver->save();

         return back()->with('mensaje', 'Corte realizado con exito ');
    }

}
