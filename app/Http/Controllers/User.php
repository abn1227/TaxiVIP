<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;

class User extends Controller
{
    /*Muestra los datos de el usuario logueado*/
    public function seeData(){
        $array=$this->getUser();
        $user=$array[0];
        $person=$array[1];
        return view('user.detailUser',compact('user','person'));
    }

    public function editUser(){
        $array=$this->getUser();
        $user=$array[0];
        $person=$array[1];
        return view('user.user',compact('user','person'));
    }
    
    public function getUser()
    {
        $user = Auth::user();
        $person=App\Person::findOrFail($user->persons_id);
        $array = [$user,$person];
        return $array;
    }

    /*Funcion que actualiza los datos del usuario y la persona mediante el llamado de las funcion
    que se encargan de cada una de estas tareas*/
    public function update( Request $request, $id){
        $idPerson=$this->updateUser( $request, $id);
        $this->updatePerson( $request, $idPerson);
        //Obtiene el usuario logueado y envia a la vista de editar usuario
        $array=$this->getUser();
        $user=$array[0];
        $person=$array[1];
        session(['mensaje'=>'Usuario Actualizado']);
        return view('user.detailUser',compact('user','person'));
    }
    /*
    Esta funcion agrega un usuario a la base de datos, previamente revisa si la persona 
    ya existe en la base de datos, de no existir llama la funcion que agrega a la persona. 
    
    En caso de que la persona ya exista se asegura que esa persona no cuente con un 
    usuario, si no hay un usuario lo crea. 
    */
    public function createUser(Request $request){
        //si la persona no existe, lo crea y obtiene su id. sino solo obtiene el id
        // Inicio validaciones
        $request->validate([
            'inputNewidentification'=>'required|max:13|unique:persons,identification',
            'inputNewName'=>'required',
            'inputNewMobile'=>'required',
            'inputNewEmail'=>'required|unique:users,email',
            'inputNewPassword'=>'required',
            'role'=>'required'
        ],
        [
            'inputNewidentification.required'=>'Campo identificacion es necesario',
            'inputNewidentification.unique'=>'Ya existe una persona registrada con este id',
            'inputNewName.required'=>'Campo nombre es obligatorio',
            'inputNewMobile.required'=>'Es obligario que ingrese un numero de telefono',
            'inputNewEmail.required'=>'Campo obligatorio',
            'inputNewEmail.unique'=>'ya existe un usuario con este correo',
            'inputNewPassword.required'=>'RTN ya existe para otra empresa',
            'role.required'=>'Debe seleccionar un rol'
        ]);
        // Fin validaciones
        
        if (DB::table('persons')->where('identification',$request->inputNewidentification)->doesntExist()) {
            $id=$this->person($request);
        }

        //si la persona no tiene un usuario lo crea
        if (DB::table('users')->where('persons_id',$id)->doesntExist()) {
           $this->user($request, $id);
           session(['mensaje'=>'Empleado agregado']);
           $typeUser=$request->role;
           if ($typeUser==3) {
            return view('user.createUser', ['id'=>$id,'typeUser'=>$typeUser]);
           }
           else{
               return view('user.createUser');
           }
           
        }
    }
    /*Funcion cuyo objetivo es mostrar el formulario para agregar un usuario*/
    public function showFormCreate(){
        return view('user.createUser');
    }
    /*funcion que inserta a la persona*/
    public function person(Request $request)
    {
        $person= new App\Person;
            $person->identification=$request->inputNewidentification;
            $person->name=$request->inputNewName;
            $person->mobile=$request->inputNewMobile;
            $person->save();
            $id= DB::table('persons')->where('identification',$request->inputNewidentification)->value('id');
            return $id;
    }
    /*funcion que inserta a el usuario*/
    public function user(Request $request, $id)
    {
        $newUser= new App\User;
        $newUser->email=$request->inputNewEmail;
        $newUser->password=bcrypt($request->inputNewPassword);
        $newUser->type_users_id=$request->role;
        $newUser->persons_id=$id;
        $newUser->save();
        return;
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
    //Actualiza el usuario
    public function updateUser(Request $request, $id)
    {
        $userUpdate= App\User::findOrFail($id);
        $userUpdate->email = $request->inputEmail;
        $userUpdate->password = bcrypt($request->inputPassword);    
        $userUpdate->save();
        $id= DB::table('users')->where('id',$id)->value('persons_id');
        return $id;
    }
}
