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
        $model= new App\Car_Model;
        $model->name=$request->carModel;
        $model->car_brands_id=$request->searchCarBrand;
        $model->save();
        session(['mensaje'=>'Modelo agregada exitosamente']);
        return back();
    }
    public function showModel(){
        $brand = new CarBrand;
        $brands= $brand->getCarBrand();
        $models= App\Car_Model::all();
        return view('vehicles.model.carModel', compact('brands','models'));
    }
}
