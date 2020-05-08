<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CarBrand extends Controller
{
    public function init(){
        return view('vehicles.carBrand.createCarBrand');
    }
    public function save(Request $request){
        $brand= new App\Car_Brand;
        $brand->name=$request->inputBrandName;
        $brand->save();
        session(['mensaje'=>'Marca agregada exitosamente']);
        return view('vehicles.carBrand.createCarBrand');
    }
    public function showBrand(){
        $Brands= App\Car_Brand::paginate(5);
        return view('vehicles.carBrand.carBrand', compact('Brands'));
    }
    public function getCarBrand(){
        $Brands= App\Car_Brand::all();
        return $Brands;
    }
}
