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
{{-- Guardado exitoso --}}
@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif
{{-- fin guardado exitoso --}}
<div class="container" >
  <div class="container" >
    <div class="row">
      {{-- Imagen taxista  --}}
      <div class="col-lg-6" align="left" >
        <img src="{{ asset('img/taxista.jpg') }}" class="ui fluid image" >
      </div>
      {{-- Fin imagen --}}
      {{-- Datos taxista --}}

      <div class="col-lg-6" >
       <table class="ui yellow table">
        <thead>
          <th colspan="2" style="text-align: center">
            <h3>Informacion personal del Taxista</h3>
          </th>
        </thead>
        <tbody>
          <tr>
            <td><label >Indentificacion</label></td>
            <td>{{$taxiDriver->person->identification}}</td>
          </tr>
          <tr>
            <td><label >Nombre</label></td>
            <td>{{$taxiDriver->person->name}}</td>
          </tr>
          <tr>
            <td><label >Celular</label></td>
            <td>{{$taxiDriver->person->mobile}}</td>
          </tr>
          <tr>
            <td><label >Porcentaje</label></td>
            <td>{{$taxiDriver->percentage}}</td>
          </tr>
          <tr>
            <td><label >Kilometraje</label></td>
            <td>{{$taxiDriver->mileage}}</td>
          </tr>
          <tr>
            <td><label >Fecha de corte</label></td>
            <td>{{$corte}}</td>
          </tr>
          <tr>
            <td><label >Vigencia de licencia</label></td>
            <td>{{$taxiDriver->current_driver_license}}</td>
          </tr>
          <tr>
            <td><label >Vehiculo</label></td>
            <td>{{$vehicleActivate->license_plate}}</td>
          </tr>
          <tr>
            <td><label >Ruta</label></td>
            <td>{{$taxiDriver->routeZone->name}}</td>
          </tr>
          <tr>
            <td colspan="2" >
             <form action="{{route('edit-taxidriver',$taxiDriver->id)}}" method="get">
               <button type="submit" class="btn btn-warning btn-block">
                <i class="edit outline icon"></i>Editar</button>
             </form>
            </td>
          </tr>
        </tbody>
       </table>
      </div>

      {{-- Fin datos taxista --}}
    </div>
    
  </div>
  
</div>
@endsection

