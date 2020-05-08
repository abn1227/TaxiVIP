<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;
use App\Http\Controllers\Person;

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
    public function update( UserRequest  $request, $id){
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
    Funcion que se encarga de crear al usuario, esta hace el llamado a user y person que son los metodos 
    que agregan la informacion a las tablas
    */
    public function createUser(UserRequest $request){
        //Agregamos una persona a la base de datos y obtenemos el id
        $person = new Person;
        $id=$person->person($request);
        $this->user($request, $id);
        session(['mensaje'=>'Empleado agregado']);
        // Validacion para activar la ventana model que contiene el formulario para agregar taxista y vehiculo
        $typeUser=$request->role;
        if ($typeUser==3) {
           return view('user.createUser', ['id'=>$id,'typeUser'=>$typeUser]);
        }
        else{
            return view('user.createUser');
        }
           
        
    }
    /*Funcion cuyo objetivo es mostrar el formulario para agregar un usuario*/
    public function showFormCreate(){
        return view('user.createUser');
    }
    /*funcion que inserta a la persona*/
    
    /*funcion que inserta a el usuario*/
    public function user(UserRequest $request, $id)
    {
        $newUser= new App\User;
        $newUser->email=$request->inputNewEmail;
        $newUser->password=bcrypt($request->inputNewPassword);
        $newUser->type_users_id=$request->role;
        $newUser->status='1';
        $newUser->persons_id=$id;
        $newUser->save();
        return;
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
