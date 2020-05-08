@extends('templates/mainTemplate')

@section('title')
    Empleados
@endsection

@section('body')
@extends('templates/navBarAdmin')
{{-- Barra de busqueda --}}
<div class="ui fluid action input">
  <input type="text" placeholder="Search...">
  <div class="ui button">Search</div>
</div>
{{-- Fin barra de busqueda --}}

<table class="ui yellow table">
  <thead>
    <tr>
      <th>identidad</th>
      <th>Name</th>
      <th>Celular</th>
    </tr>
  </thead>
@foreach ($taxistas as $item)
    <tbody>
      <tr>

        <td>{{$item->person->identification}}</td>
        <td>{{$item->person->name}}</td>
        <td>{{$item->person->mobile}}</td>
        <td>
          <a href="{{route('detail-taxidriver',$item->id)}}" class="ui yellow button"> Detalle </a>
        </td>
      </tr>
    </tbody>

    
@endforeach
</table>
{{ $taxistas->links() }}
@endsection