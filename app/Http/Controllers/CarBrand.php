<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarBrandRequest;
use App;

class CarBrand extends Controller
{
    public function init(){
        return view('vehicles.carBrand.createCarBrand');
    }
    public function save(CarBrandRequest $request){
        $brand= new App\Car_Brand;
        $brand->name=$request->inputBrandName;
        $brand->save();
        $request->session()->flash('mensaje','Marca agregada con exito');
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
    public function edit($id)
    {
        $Brands= App\Car_Brand::findOrFail($id);
        return view('vehicles.carBrand.editCarBrand',compact('Brands'));
    }
    public function update($id, CarBrandRequest $request)
    {
        $brands= App\Car_Brand::findOrFail($id);
        $brands->name=$request->inputEditBrandName;
        $brands->save();
        $request->session()->flash('mensaje','Marca actualizada con exito');
        return back();
    }
}
