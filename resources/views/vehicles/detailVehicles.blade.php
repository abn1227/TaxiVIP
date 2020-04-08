@extends('templates/mainTemplate')

@section('title')
    Detalle de Vehiculos
@endsection

@section('body')
@extends('templates/navBarAdmin')

<div class="container" >
  <div class="container" >
    <div class="row">
      {{-- Imagen taxista  --}}
      <div class="col-lg-6" align="left" >
        <img src="{{ asset('img/carrera.jpg') }}" >
      </div>
      {{-- Fin imagen --}}
      {{-- Datos taxista --}}

      <div class="col-lg-6" style="padding-top:30px; ">
      <h1>Detalle de Vehiculos</h1>
       <table class="ui yellow table">
        <thead>
          <th>ID Vehiculo</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th># de Placa</th>
          <th>Disponibilidad</th>
          <th>ID Conductor</th>
        </thead>
        <tbody>
          <tr>
            <td><label>{{ $vehicle->id }}</label></td>
            <td>{{ $vehicle->cardBrand }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->licensePlate }}</td>
            <td>{{ $vehicle->active }}</td>
            <td>{{ $vehicle->taxyDrivers_id }}</td>
          </tr>
          
        </tbody>
       </table>

            <div style="margin-left: 50px">
            <a href="{{route('carros')}}"><button class="large ui blue basic button">Atras</button></a>
                     
          </div>
            
      </div>

      {{-- Fin datos taxista --}}
    </div>
    
  </div>
    
</div>


@endsection