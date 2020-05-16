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
              <div class="col-lg-7" align="center" >
              <img src="{{ asset('img/empleados.jpg') }}" class="ui fluid image">
              </div>
              <div class="col-lg-5" style="padding-top:60px;">
              <form method="POST" action="{{route('add-user')}}"  class="ui form"> 
              @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Identificacion</label>
                    <input type="text" class="form-control" 
                            name="inputNewidentification" 
                            aria-describedby="emailHelp"
                            value="{{old('inputNewidentification')}}"
                            required>
                  </div>
                
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" 
                              name="inputNewName" 
                              aria-describedby="emailHelp"
                              value="{{old('inputNewName')}}"
                              required>
                  </div>    

                  <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" 
                              name="inputNewEmail" 
                              aria-describedby="emailHelp"
                              value="{{old('inputNewEmail')}}"
                              required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Celular</label>
                    <input type="text" class="form-control" 
                            name="inputNewMobile" 
                            aria-describedby="emailHelp"
                            value="{{old('inputNewMobile')}}"
                            required>
                  </div>

                  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" 
                              name="inputNewPassword"
                              value="{{old('inputNewPassword')}}"
                              required>
                  </div>

                  
                        
                  <table class="ui table">
                    <tr>
                      <td>
                        <label>Cargo:</label>
                      </td>
                      <td>
                        <div class="ui radio checkbox">
                          <input type="radio" name="role" value="2" tabindex="0" class="hidden" 
                          {{ old('role') == "2" ? "checked" : "" }}>
                          <label>Operario</label>
                        </div>
                      </td>
                      <td>
                        <div class="ui radio checkbox">
                          <input type="radio" name="role" value="3" tabindex="0" class="hidden"
                          {{ old('role') == "3" ? "checked" : "" }}>
                          <label>Taxista</label>
                        </div>
                      </td>
                      <td>
                        <div class="ui radio checkbox">
                          <input type="radio" name="role" value="1" tabindex="0" class="hidden"
                          {{ old('role') == "1" ? "checked" : "" }}>
                          <label>Administrador</label>
                        </div>
                      </td>
                    </tr>
                  </table>
                  
                    <table class="ui table">
                      <tr>
                        <td>
                          <button type="submit" name="inputAdd" class="ui blue button fluid">Agregar</button>
                        </td>
                        <td>
                          <button type="reset" class="ui teal basic button fluid">Limpiar</button>
                        </td>
                        <td>
                          <button  type="button" id ="showModal" name="showModal" class="fluid ui blue basic button">Taxista</button>
                        </td>
                      </tr>
                    </table>
                  
                  
              </form>
              <!--
              Aqui esta contenida la ventana modal que sirve para registrar los datos de el taxista
              -->
              <input type="hidden" name="pruebaid" id="pruebaid" value="{{session('id')}}">
              <div style="position: fixed; top: 30%;">
                @includeWhen(isset($id,$typeUser),'user/taxiDriverModal')
                {{-- @include('user/taxiDriverModal') --}}
              </div>              
            
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