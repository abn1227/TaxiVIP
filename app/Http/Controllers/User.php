<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;
use App\Http\Controllers\Person;
use App\Http\Controllers\CarModel;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Route;

class User extends Controller
{
    //--------------------------------------------------------------------------------------
    /*Muestra los datos de el usuario logueado*/
    //--------------------------------------------------------------------------------------
    public function seeData(){
        $array=$this->getUser();
        $user=$array[0];
        $person=$array[1];
        return view('user.detailUser',compact('user','person'));
    }
    //--------------------------------------------------------------------------------------
    //Muestra los datos del usuario al cual se le haran modificaciones
    //--------------------------------------------------------------------------------------
    public function editUser(){
        $array=$this->getUser();
        $user=$array[0];
        $person=$array[1];
        return view('user.user',compact('user','person'));
    }
    //--------------------------------------------------------------------------------------
    /*Obtiene el usuario logueado y retorna esos valores en un array*/
    //--------------------------------------------------------------------------------------
    public function getUser()
    {
        $user = Auth::user();
        $person=App\Person::findOrFail($user->persons_id);
        $array = [$user,$person];
        return $array;
    }
    //--------------------------------------------------------------------------------------
    /*Funcion que actualiza los datos del usuario y la persona mediante el llamado de las funcion
    que se encargan de cada una de estas tareas*/
    //--------------------------------------------------------------------------------------
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
    //--------------------------------------------------------------------------------------
    /*
    Funcion que se encarga de crear al usuario, esta hace el llamado a user y person que son los metodos 
    que agregan la informacion a las tablas
    */
    //--------------------------------------------------------------------------------------
    public function createUser(UserRequest $request){
        //Instancias de controladores para llamar informacion de la base de datos 
        $person = new Person;
        $model = new CarModel;
        $route = new Route;
        //--------------------------------------------------------------------------------------
        //Llamado a los metodos necesarios para cargar el formulario de taxista
        //Asi como la creacion de la persona en la base de datos
        //--------------------------------------------------------------------------------------
        $models=$model->getCarModel();
        $id=$person->person($request);
        $routes=$route->getRoute();
        session(['id'=>$id]);
        //--------------------------------------------------------------------------------------
        //Llamado al metodo que crea al usuario
        //--------------------------------------------------------------------------------------
        $this->user($request, $id);
        
        $request->session()->flash('mensaje','empleado Agregado');
        // Validacion para activar la ventana modal que contiene el formulario para agregar taxista y vehiculo
        $typeUser=$request->role;
        if ($typeUser==3) {
           return view('user.createUser', ['id'=>$id,'typeUser'=>$typeUser,'models'=>$models,'routes'=>$routes]);
        }
        else{
            return view('user.createUser');
        }
           
        
    }
    /*Funcion cuyo objetivo es mostrar el formulario para agregar un usuario*/
    public function showFormCreate(){
        return view('user.createUser');
    }
    public function showFormCreateId(){
        $model = new CarModel;
        $models=$model->getCarModel();
        $typeUser=3;
        $id=session('id');
        return view('user.createUser', ['id'=>$id,'typeUser'=>$typeUser,'models'=>$models]);
    }
    
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
