<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class TaxiDriver extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTaxiDriving(Request $request){
        $taxiDrivers= new App\Taxi_Driver;
        $taxiDrivers->persons_id=$request->inputIdPerson;
        $taxiDrivers->driving_license=$request->inputDrivingLicense;
        $taxiDrivers->mileage=0;
        $taxiDrivers->percentage=$request->inputPercentaje;
        $taxiDrivers->cut_date=$request->cut;
        $taxiDrivers->save();
        session(['mensaje'=>'Taxista Agregado']);
        return view('user.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    { 
        //
        $taxistas= App\Taxi_Driver::all();
        return view('user.taxiDriver',compact('taxistas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTaxiDriver($id)
    {
        //
        $taxiDriver= App\Taxi_Driver::findOrFail($id);
        $user= App\User::findOrFail($taxiDriver->persons_id);
        return view('user.editTaxiDriver',compact('taxiDriver','user'));
    }
    public function showTaxiDriver($id)
    {
        $taxiDriver= App\Taxi_Driver::findOrFail($id);
        $user= App\User::findOrFail($taxiDriver->persons_id);
        return view('user.detailTaxiDriver',compact('taxiDriver','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTaxiDriver(Request $request, $id)
    {
        $taxiDriver= App\Taxi_Driver::findOrFail($id);
        $personUpdate= App\Person::findOrFail($taxiDriver->persons_id);
        $user= App\User::findOrFail($taxiDriver->persons_id);
        $request->validate([
            'inputTaxiDriverIdentification'=>'required|max:13','unique:persons,identification,$taxiDriver->person->identification',
            'inputTaxiDriverName'=>'required',
            'inputTaxiDriverMobile'=>'required',
            'inputTaxiDriverLicense'=>'required',
            'inputTaxiDriverEmail'=>'required','unique:users,email,$user->email'
        ],
        [
            'inputTaxiDriverIdentification.required'=>'Campo identificacion es necesario',
            'inputTaxiDriverIdentification.unique'=>'Ya existe una persona registrada con este id',
            'inputTaxiDriverName.required'=>'Campo nombre es obligatorio',
            'inputTaxiDriverMobile.required'=>'Es obligario que ingrese un numero de telefono',
            'inputTaxiDriverLicense.required'=>'Campo obligatorio',
            'inputTaxiDriverLicense.required'=>'email es un campo obligatorio',
            'inputTaxiDriverEmail.unique'=>'ya existe un usuario con este correo',
            'inputTaxiDriverEmail.required'=>'Email es un campo requerido'
        ]);
            
            $taxiDriver->driving_license=$request->inputTaxiDriverLicense;
            $taxiDriver->save();

            $personUpdate->name = $request->inputTaxiDriverName;
            $personUpdate->identification = $request->inputTaxiDriverIdentification;
            $personUpdate->mobile = $request->inputTaxiDriverMobile;    
            $personUpdate->save();

            $user->email=$request->inputTaxiDriverEmail;
            $user->save();
            return view('user.detailTaxiDriver',compact('taxiDriver','user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
