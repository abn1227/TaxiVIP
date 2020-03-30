@extends('templates/mainTemplate')

@section('title')
    User
@endsection

@section('body')
@extends('templates/navBar')
<div class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col" align="center" >
    <img src="{{ asset('img/recepcionista.jpg') }}" alt="" style="width: 250px; height: 400px; ">
    </div>
    <div class="col" style="padding-top:10px; padding-right:120px;">
     
    <form method="POST" action="{{route('update-user',$user->id)}}" > 
    @method('PUT')
    @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Identificacion</label>
          <input type="text" class="form-control" 
                  name="inputIdentification" 
                  aria-describedby="emailHelp"
                  value="{{$person->identification }}"
                  >
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" 
                    name="inputName" 
                    aria-describedby="emailHelp"
                    value="{{$person->name }}">
        </div>
        
    
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" 
                    name="inputEmail" 
                    aria-describedby="emailHelp"
                    value="{{ $user->email }}">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Celular</label>
          <input type="text" class="form-control" 
                  name="inputMobile" 
                  aria-describedby="emailHelp"
                  value="{{ $person->mobile }}">
       </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" 
                    name="inputPassword"
                    placeholder="Nueva contraseña"
                    value="">
        </div>
        
        <button type="submit" name="inputUpdate" class="btn btn-warning btn-block">Actualizar</button>
    </form>




    </div>
  </div>
  
</div>
  

@endsection
