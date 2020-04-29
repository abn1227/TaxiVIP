@extends('templates/mainTemplate')

@section('title')
    Taxista
@endsection

@section('body')
@extends('templates/navBarAdmin')
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
  <div class="container" >
    <div class="row">
      {{-- Imagen taxista  --}}
      <div class="col-lg-6" align="left" >
        <img src="{{ asset('img/taxista.jpg') }}" >
      </div>
      {{-- Fin imagen --}}
      {{-- Datos taxista --}}

      <div class="col-lg-6" style="padding-top:30px; ">
       <table class="ui yellow table">
        <thead>
          <th>Campo</th>
          <th>Datos</th>
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
            <td><label >Email</label></td>
            <td>{{$user->email}}</td>
          </tr>
          <tr>
            <td colspan="2">
             <form action="{{route('edit-taxidriver',$taxiDriver->id)}}" method="get">
               <button type="submit" class="btn btn-warning btn-block">Editar</button>
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