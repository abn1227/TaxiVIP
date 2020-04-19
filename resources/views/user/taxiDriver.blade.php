@extends('templates/mainTemplate')

@section('title')
    User
@endsection

@section('body')
@extends('templates/navBarAdmin')

<table class="ui yellow table">
  <thead>
    <tr>
      <th>identidad</th>
      <th>Name</th>
      <th>Celular</th>
      <th>Porcentaje</th>
      <th>Licencia</th>
      <th>Fecha de corte</th>
      <th>Informacion</th>
    </tr>
  </thead>
@foreach ($taxistas as $item)
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
        <td>{{$item->driving_license}}</td> 
        <td>{{$corte}}</td>
        <td>
          <a href="{{route('detail-taxidriver',$item->id)}}" class="ui yellow button"> Detalle </a>
        </td>
      </tr>
    </tbody>

    
@endforeach
</table>
{{ $taxistas->links() }}
@endsection