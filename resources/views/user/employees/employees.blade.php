@extends('templates/mainTemplate')

@section('title')
    Empleados
@endsection

@section('body')
@extends('templates/navBar')
 {{-- actualizado exitoso --}}
 @if (session('mensaje'))
 <div class="alert alert-success">
     {{session('mensaje')}}
 </div>
@endif
{{-- fin actualizado exitoso --}}

<table class="ui yellow table">
  <thead>
    <tr>
      <th>identidad</th>
      <th>Name</th>
      <th>Email</th>
      <th>Celular</th>
      <th>Cargo</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  {{-- <label for="">{{$users}}</label> --}}
@foreach ($users as $item)
{{-- -------------------------------------------------------------------------------------------
Validacion para mostrar al usuario si el empleado aun labora en la empresa
------------------------------------------------------------------------------------------- --}}
@switch($item->status)
    @case(1)
      <?php $status='Activo' ?>
        @break
    @case(0)
    <?php $status='Inhabilitado' ?>
        @break
    @default
        
@endswitch
{{-- --------------------------------------------------------------------------------------------------
  Fin de la validacion
-------------------------------------------------------------------------------------------------- --}}
    <tbody>
      <tr>

        <td>{{$item->person->identification}}</td>
        <td>{{$item->person->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->person->mobile}}</td>
        <td>{{$item->typeUser->description}}</td>
        <td>{{$status}}</td>
        <td>
          <a href="{{route('edit-employees',$item->id)}}" class="ui yellow button"> 
            <i class="edit icon "></i>Editar</a>
        </td>
      </tr>
    </tbody>

    
@endforeach
</table>
{{ $users->links() }}
@endsection