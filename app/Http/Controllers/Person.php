<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Person;
use Illuminate\Support\Facades\DB;
use App;


class Person extends Controller
{
    public function person(UserRequest $request)
    {
            $person= new App\Person;
            $person->identification=$request->inputNewidentification;
            $person->name=$request->inputNewName;
            $person->mobile=$request->inputNewMobile;
            $person->status='1';
            $person->save();
            $id= DB::table('persons')->where('identification',$request->inputNewidentification)->value('id');
            return $id;
    }
     //Actualiza los datos de la persona
     public function updatePerson(Request $request, $id)
     {
         $personUpdate= App\Person::findOrFail($id);
         $personUpdate->name = $request->inputName;
         $personUpdate->identification = $request->inputIdentification;
         $personUpdate->mobile = $request->inputMobile;    
         $personUpdate->save();
     }
}
