<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Cut;

class TaxiDriverSohwData extends Controller
{
    public function init(){

        return view('cut.cut', compact('taxiDriver'));
    }
}
