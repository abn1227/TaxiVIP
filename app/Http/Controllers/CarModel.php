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
        $request->session()->flash('mensaje','Modelo actualizado con exito');
        return back();
    }
    public function showModel(){
        $models= App\Car_Model::paginate(10);
        return view('vehicles.model.carModel', compact('brands','models'));
    }
    public function getCarModel(){
        $models= App\Car_Model::all();
        return $models;
    }
    public function edit($id)
    {
        $brand = new CarBrand;
        $brands= $brand->getCarBrand();
        $model= App\Car_Model::findOrFail($id);
        return view('vehicles.model.editCarModel', compact('model','brands'));
    }
    public function update(Request $request,$id)
    {
        $model= App\Car_Model::findOrFail($id);
        $model->name=$request->editCarModel;
        $model->car_brands_id=$request->editSearchCarBrand;
        $model->save();
        session(['mensaje'=>'Modelo actualizado exitosamente']);
        return back();
    }
}
