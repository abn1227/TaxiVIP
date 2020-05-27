@extends('templates/mainTemplate')

@section('title')
    Modelos
@endsection

@section('body')
@extends('templates/navBar')
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
    {{-- Columna numero 1 --}}
      <div class="col-lg-4" >
        
        @include('templates/menu')
      </div>
    {{-- Fin Columna numero 1   --}}
    
    {{-- Columna numero 2 --}}
    <div class="col-lg-8" style="margin-left: 0px" >  
        <table class="ui table yellow">
           <thead>
               <tr>
                   <th>Marca</th>
                   <th>Modelo</th>
                   <th>Acciones</th>
               </tr>
           </thead>
            <tbody>
              @foreach ($models as $model)
                  <tr>
                      <td>{{$model->car_brand->name}}</td>
                      <td>{{$model->name}}</td>
            
                      <td>
                        <form action="{{route('edit-model',$model->id)}}" method="GET">
                          @csrf
                          <button class="ui button yellow fluid">
                            <i class="info icon"></i>Editar</button>
                        </form>
                      </td>
                  </tr>
              @endforeach
            </tbody>
          </table>    
          {{ $models->links() }}
    </div>
      
    {{-- Fin Columna numero 1   --}}
    </div>
    
  </div>
</div>
@endsection

