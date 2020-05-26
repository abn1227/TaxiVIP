@extends('templates/mainTemplate')

@section('title')
    User
@endsection

@section('body')
@extends('templates/navBar')
 {{-- Guardado exitoso --}}
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        @endif
        {{-- fin guardado exitoso --}}


<table class="ui yellow table">
  <thead>
    <tr>
      <th>identidad</th>
      <th>Name</th>
      <th>Celular</th>
      <th>Porcentaje</th>
      <th>Fecha de corte</th>
      <th>Informacion</th>
    </tr>
  </thead>
@foreach ($taxiDrivers as $item)
@switch($item->cut_date)
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

    <tbody>
      <tr>

        <td>{{$item->person->identification}}</td>
        <td>{{$item->person->name}}</td>
        <td>{{$item->person->mobile}}</td> 
        <td>{{$item->percentage}}</td>
        <td>{{$corte}}</td>
        <td>
          <a href="{{route('detail-taxidriver',$item->id)}}" class="ui yellow button"> Detalle </a>
        </td>
      </tr>
    </tbody>

    
@endforeach
</table>
{{ $taxiDrivers->links() }}
@endsection