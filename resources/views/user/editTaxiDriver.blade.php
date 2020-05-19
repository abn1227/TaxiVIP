@extends('templates/mainTemplate')

@section('title')
    Taxista
@endsection

@section('body')
@extends('templates/navBar')
@switch($taxiDriver->cut_date)
    @case(1)
        <?php $corte='Diario' ?>
        @break
    @case(2)
        <?php $corte='Semanal' ?>
        @break
    @case(3)
        <?php $corte='Quincenal' ?>
        @break
    @default
   
@endswitch
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
  <div class="container" >
    <div class="row">
      {{-- Imagen taxista  --}}
      <div class="col-lg-6"  >
        <img src="{{ asset('img/taxista.jpg') }}" class="ui fluid image">
      </div>
      
      {{-- Fin imagen --}}
      {{-- Datos taxista --}}
      
      <div class="col-lg-6" >
        
      <form action="{{route('update-taxidriver',$taxiDriver->id)}}" method="post">
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
                      name="inputTaxiDriverIdentification" 
                      value="{{old('inputTaxiDriverIdentification',$taxiDriver->person->identification)}}"
                      required>
            </td>
          </tr>
          <tr>
            <td><label >Nombre</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputTaxiDriverName" 
              value="{{old('inputTaxiDriverName',$taxiDriver->person->name)}}"
              required> 
            </td>
          </tr>
          <tr>
            <td><label >Celular</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputTaxiDriverMobile" 
              value="{{old('inputTaxiDriverMobile',$taxiDriver->person->mobile)}}"
              required>
            </td>
          </tr>
          <tr>
            <td><label >Porcentaje</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputTaxiDriverPercentage" 
              value="{{old('inputTaxiDriverPercentage',$taxiDriver->percentage)}}"
              required>
            </td>
          </tr>
          <tr>
           
          </tr>
          <tr>
            <td><label >Fecha de corte</label></td>
            <td>
              <!--
            Radio botones
            -->
            <div class="ui form">
              <div class="inline fields">
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="cut" value="1"
                    {{ old('cut',$taxiDriver->cut_date) == "1" ? "checked" : "" }}
                    >
                    <label>Diario</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="cut" value="2"
                    {{ old('cut',$taxiDriver->cut_date) == "2" ? "checked" : "" }}
                    >
                    <label>Semanal</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="cut" value="3"
                    {{ old('cut',$taxiDriver->cut_date) == "3" ? "checked" : "" }}
                    >
                    <label>Quincenal</label>
                  </div>
                </div>
              </div>
            </div>
                      
          <!--Fin radiobotones-->
            </td>
          </tr>

          <tr>
            <td><label >Vigencia de licencia</label></td>
            <td>
              <input type="date" class="form-control"
              name="inputTaxiDriverDate" 
              value="{{old('inputTaxiDriverPercentage',$taxiDriver->current_driver_license)}}"
              required>
            </td>
          </tr>


          <tr>
            <td><label >Vehiculo activo</label></td>
            <td >
              <select class="ui search dropdown" name="selectVehicle">
                <option value="">Seleccione un vehiculo</option>
                 @foreach ($vehicle as $item)
                     <option value="{{$item->id}}"
                      {{old('selectVehicle',$item->id) == "$vehicleActivate->id" ? "selected" : "" }} >{{$item->license_plate}}</option>
                 @endforeach              
              </select>
              {{-- <label for="">{{$vehicle}}</label> --}}
            </td>
          </tr>

          <tr>
            <td><label >Ruta Asignada</label></td>
            <td >
              <select class="ui search dropdown" name="route">
                <option value="">Seleccione una ruta</option>
                 @foreach ($routes as $route)
                     <option value="{{$route->id}}"
                      {{old('route',$route->id) == "$taxiDriver->route_zones_id" ? "selected" : "" }} >{{$route->name}}</option>
                 @endforeach              
              </select>
              {{-- <label for="">{{$vehicle}}</label> --}}
            </td>
          </tr>


          <tr>
            <td colspan="2">
              <div class="ui fluid buttons">
               <button type="submit" class="ui yellow button">
                <i class="undo icon"></i>Actualizar</button>
               <div class="or"></div>
               <button class="ui teal button" type="button" id="vehicle" name="vehicle">
                <i class="eye icon"></i>Vehiculo</button>
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
  {{-- Incluir Modal --}}
  @includeWhen(isset($vehicle),'vehicles.detailVehicleModal')
  @include('vehicles.createVehiclesModal')
  {{-- Fin Modal --}}
</div>
@endsection
@section('executionScripts')

<script>
//---------------------------------------------------------------
//Ventana Modalx
//---------------------------------------------------------------
$('.coupled.modal').modal({allowMultiple: false,});
$("#vehicle").click(function(){
  $('.detail.modal').modal('show');
});
$('#create.modal').modal('attach events', '.detail.modal #callCreate');
//---------------------------------------------------------------
//Fin ventana modal
//---------------------------------------------------------------

//---------------------------------------------------------------
//radiobotones
//---------------------------------------------------------------
$('.ui.radio.checkbox').checkbox();
//
</script>
@endsection