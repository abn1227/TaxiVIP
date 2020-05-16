@extends('templates.mainTemplate')

@section('title')
Route
@endsection

@section('body')
@extends('templates.navBar')

<h2>
    Rutas
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
        {{-- Formulario --}}
        <form class="ui form" action="{{route('save-route')}}" method="post">
            @csrf
            <div class="field">
              <label>Nombre de la ruta</label>
              <input type="text" name="route"  required>
            </div>
            <button class="ui button blue fluid" type="submit">
                <i class="save icon"></i> Guardar</button>
          </form>
        {{-- Fin Formulario --}}
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

