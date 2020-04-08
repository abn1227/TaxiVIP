@extends('templates/mainTemplate')

@section('title')
    Vehiculos
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
      

      <div class="col-lg-6" style="padding-top:30px; ">
       <table class="ui yellow table">
        <thead>
          <th>Detalle Vehiculo</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th># de Placa</th>
          <th>Disponibilidad</th>
          <th>ID Conductor</th>
          <th>Cambiar Registros</th>
           <th>Eliminar registros</th>
        </thead>
        <tbody>

          @foreach($vehicles as $item)
          <tr>
            <td><label>

              <a href="{{route('detailVehicles', $item)}}">
              {{ $item->id }}
              </a>
            </label>

            </td>
            <td>{{ $item->cardBrand }}</td>
            <td>{{ $item->model }}</td>
            <td>{{ $item->licensePlate }}</td>
            <td>{{ $item->active }}</td>
            <td>{{ $item->taxyDrivers_id }}</td>
            
            <td>
               <a href="{{route('update.vehicles', $item)}}"> <button class="btn btn-warning btn-sm">Actualizar</button></a>


            </td>

             <td>

              <form action="{{route('delete.vehicles', $item)}}" method="POST">
                   @method('DELETE')
                   @csrf
                   <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
               

              </form>
            </td>
          </tr>
          @endforeach
          
          
        </tbody>
       </table>
        <a href="{{route('create')}}"><button class="large ui blue button">Agregar</button></a>  

         <div class="col-lg-6" style="padding-top:30px;">
        
        {{$vehicles->links()}}
        </div>
        
   
      </div>


    
    </div>
    
  </div>
    
</div>

@endsection



