@extends('templates/mainTemplate')

@section('title')
    Taxista
@endsection

@section('body')
@extends('templates/navBar')

<div class="container" >
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
 {{-- Actualizado exitoso --}}
 @if (session('mensaje'))
 <div class="alert alert-success">
     {{session('mensaje')}}
 </div>
@endif
{{-- fin actualizado exitoso --}}   
  <div class="container" >
    <div class="row">
      {{-- Imagen taxista  --}}
      <div class="col-lg-6" align="left" >
        <img src="{{ asset('img/taxista.jpg') }}" >
        
      </div>
      
      {{-- Fin imagen --}}
      {{-- Datos taxista --}}
      
      <div class="col-lg-6" style="padding-top:20px; ">
        
      <form  method="post" action="{{route('update-employees',$user->id)}}">
        @method('put')
        @csrf
       <table class="ui yellow table">
        <thead>
          <th>Campo</th>
          <th>Datos</th>
        </thead>
        <tbody>
          <tr>
            <td><label >Indentificacion</label></td>
            <td>
              <input type="text" class="form-control"
                      name="inputUserIdentification" 
                      value="{{old('inputUserIdentification',$user->person->identification)}}">
            </td>
          </tr>
          <tr>
            <td><label >Nombre</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputUserName" 
              value="{{old('inputUserName',$user->person->name)}}"> 
            </td>
          </tr>
          <tr>
            <td><label >Celular</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputUserMobile" 
              value="{{old('inputUserMobile',$user->person->mobile)}}">
            </td>
          </tr>
          <tr>
            <td><label >Estado</label></td>
            <td>
                <div class="ui form">
                    <div class="inline fields">
                      <div class="field">
                        <div class="ui radio checkbox">
                          <input type="radio" name="status" value="1"
                          {{ old('status',$user->status) == "1" ? "checked" : "" }}
                          >
                          <label>Activo</label>
                        </div>
                      </div>
                      <div class="field">
                        <div class="ui radio checkbox">
                          <input type="radio" name="status" value="0"
                          {{ old('status',$user->status) == "0" ? "checked" : "" }}
                          >
                          <label>Deshabilitado</label>
                        </div>
                      </div>
                     
                    </div>
                </div>
            </td>
          </tr>
        
          
          <tr>
            <td colspan="2">
              <div class="ui fluid buttons">
               <button type="submit" class="ui yellow button">
                <i class="undo icon"></i>Actualizar</button>
              </div>
            </td>
          </tr>
        </tbody>
       </table>
      </form>
      </div>

      {{-- Fin datos taxista --}}
    </div>
    
  </div>
</div>
@endsection
@section('executionScripts')

<script>


//---------------------------------------------------------------
//radiobotones
//---------------------------------------------------------------
$('.ui.radio.checkbox').checkbox();
//
</script>
@endsection