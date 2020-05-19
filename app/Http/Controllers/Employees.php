<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App;

class Employees extends Controller
{
    //---------------------------------------------------------------------------------------------------
    //Funcion que traera a pantalla todos los empleados 
    //---------------------------------------------------------------------------------------------------
    public function getEmployees()
    {
        $users=App\User::paginate(5);
        return view('user.employees.employees',compact('users'));
    }
    //---------------------------------------------------------------------------------------------------
    //Funcion que traera a pantalla los datos de un empleado en especifico 
    //---------------------------------------------------------------------------------------------------
    public function editEmployees($id)
    {
        $user=App\User::findOrFail($id);
        return view('user.employees.editEmployees',compact('user'));
    }
    //---------------------------------------------------------------------------------------------------
    //Funcion actualizara los datos de un empleado
    //---------------------------------------------------------------------------------------------------
    public function updateEmployees(EmployeeRequest $request,$id)
    {
        $user=App\User::findOrFail($id);
        $person=App\Person::findOrFail($user->persons_id);
        $person->identification=$request->inputUserIdentification;
        $person->name=$request->inputUserName;
        $person->mobile=$request->inputUserMobile;
        $person->status=$request->status;
        $user->status=$request->status;
        $person->save();
        $user->save();
        if ($user->type_users_id==3) {
            $taxiDriver=App\Taxi_Driver::where('persons_id',$person->id)->first();
            $taxiDriver->active=$request->status;
            $taxiDriver->save();
        }
        $request->session()->flash('mensaje','Los datos del empleado han sido actualizados con exito');
        return  redirect()->route('employees');
    }
    
}
