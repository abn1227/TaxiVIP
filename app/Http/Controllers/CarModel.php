<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CarBrand;
use App;

class CarModel extends Controller
{
    public function init(){
        $brand = new CarBrand;
        $brands= $brand->getCarBrand();
        return view('vehicles.model.createCarModel',compact('brands'));
    }
    public function save(Request $request){
        $brand= new App\Car_Model;
        $brand->name=$request->carModel;
        $brand->car_brands_id=$request->searchCarBrand;
        $brand->save();
        session(['mensaje'=>'Modelo agregada exitosamente']);
        return back();
    }
    public function showBrand(){
        $Brands= App\Car_Brand::paginate(5);
        return view('vehicles.model.carBrand', compact('Brands'));
    }
}
