@extends('templates/mainTemplate')

@section('title')
    add user
@endsection

@section('body')
        @extends('templates/navBar')
        {{-- manejo de errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- Fin manejo de errores --}}
        {{-- Guardado exitoso --}}
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        @endif
        {{-- fin guardado exitoso --}}

        <div class="container" >
            <div class="row">
              <div class="col-lg-6" align="center" >
              <img src="{{ asset('img/empleados.jpg') }}" alt="" style="width: 500px; height: 500px; ">
              </div>
              <div class="col-lg-6" style="padding-top:60px; padding-right:120px;">
              <form method="POST" action="{{route('add-user')}}"> 
              @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Identificacion</label>
                    <input type="text" class="form-control" 
                            name="inputNewidentification" 
                            aria-describedby="emailHelp"
                            value="{{old('inputNewidentification')}}"
                            >
                  </div>
                
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" 
                              name="inputNewName" 
                              aria-describedby="emailHelp"
                              value="{{old('inputNewName')}}">
                  </div>    

                  <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" 
                              name="inputNewEmail" 
                              aria-describedby="emailHelp"
                              value="{{old('inputNewEmail')}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Celular</label>
                    <input type="text" class="form-control" 
                            name="inputNewMobile" 
                            aria-describedby="emailHelp"
                            value="{{old('inputNewMobile')}}">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" 
                              name="inputNewPassword"
                              value="{{old('inputNewPassword')}}">
                  </div>

                  <div class="form-group">
                        
                    <div class="ui form">
                        <div class="inline fields">
                          <label for="fruit">Cargo:</label>
                          
                          <div class="field">
                            <div class="ui radio checkbox">
                              <input type="radio" name="role" value="2" tabindex="0" class="hidden">
                              <label>Operario</label>
                            </div>
                          </div>
                          <div class="field">
                            <div class="ui radio checkbox">
                              <input type="radio" name="role" value="3" tabindex="0" class="hidden">
                              <label>Taxista</label>
                            </div>
                          </div>
                          <div class="field">
                            <div class="ui radio checkbox">
                              <input type="radio" name="role" value="1" tabindex="0" class="hidden">
                              <label>Administrador</label>
                            </div>
                          </div>
                        </div>



                  </div>

                  <div style="margin-left: 50px">
                     <button type="submit" name="inputAdd" class="large ui blue button">Agregar</button>
                     <button type="reset" class="large ui teal basic button">Limpiar</button>
                     <button  type="button" id ="showModal" name="showModal" class="large ui blue basic button">Taxista</button>
                  </div>
                  
              </form>
              <!--
              Aqui esta contenida la ventana modal que sirve para registrar los datos de el taxista
              -->
              <div style="position: fixed; top: 30%;">
                @includeWhen(isset($id,$typeUser),'user/taxiDriverModal')

                {{-- @include('user/taxiDriverModal') --}}
              </div>              
              <!--
              -------------------------------------------------------------------------------------------------------
              -------------------------------------------------------------------------------------------------------
              -->
              </div>
            </div>
            
          </div>
@endsection

@section('executionScripts')
<script>

//radiobotones
$('.ui.radio.checkbox')
  .checkbox()
;
//
//modal
$("#showModal").click(
  function(){

 $('.ui.modal')
  .modal('show');
  }

);
//

</script>
    
@endsection