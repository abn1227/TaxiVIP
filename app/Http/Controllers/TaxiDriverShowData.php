<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
//use App\Http\Controllers\Auth;
use App\Http\Controllers\Person;
use App\Http\Controllers\User;
use App\Http\Controllers\Cut;

class TaxiDriverShowData extends Controller
{
    public function init(){
        //trae todos los datos referentes al conductor
        $user = \Auth::user();
       // dd($user->id);
       // $person = \App\Person::findOrFail($user->id);
        $taxidriver = App\Taxi_Driver::where('taxi_drivers_id', '=', $user->id);
        $id = 4;
        //dd($taxidriver);
        $cut = App\Cut::findOrFail($taxidriver);
       //$taxidriver = App\Taxi_Driver::where('persons_id','=',$user->id);
        //dd($taxidriver);
       //$cut = App\Cut::where('taxi_drivers_id','=','1');
       dd($cut);
        return view('taxidrivershow.historial', compact('cut'));
    }

}
