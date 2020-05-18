@extends('templates.mainTemplate')

@section('title')
Route
@endsection

@section('body')
@extends('templates.navBar')

<h2>
    Listado de rutas
</h2>
<div class="container">
<div class="row">
    {{-- Columna derecha --}}
    <div class="col-lg-6">
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
        {{-- Mostrar en un acordion el listado de rutas y las colonias que contiene --}}
        <table class="ui table teal">
        @foreach ($routes as $route)
        <tr>
            <td>
                {{$route->name}} 
            </td>
            <td> </td>
            <td> <a type="submit" class="ui button teal fluid" href="{{route('neighborhoods',$route->id)}}">
                <i class="eye icon"></i> Colonias</a></td>
        </tr>
        
        @endforeach
        </table>
            
            
            
          
        {{-- Fin mostrar Rutas --}}
    </div>
    {{-- Fin columna derecha --}}
    {{-- Columna Izquierda --}}
    <div class="col-lg-6">
        @include('templates/neighborhoodMenu')
        <img src="{{ asset('img/map.png') }}" alt="" class="ui fluid image">
    </div>
    {{-- Fin columna izquierda --}}
</div>
</div>
@endsection

