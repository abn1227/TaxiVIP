@extends('templates.mainTemplate')

@section('title')
Address
@endsection

@section('body')
@extends('templates.navBar')

<h5>
    Bienvenido a el modulo de direcciones
</h5>
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
        <form class="ui form" action="{{route('save-addresses')}}" method="post">
            @csrf
            <div class="field">
                <label>Ruta</label>
                <select name="selectRoute" required>
                    <option value="">Seleccione una ruta</option>
                    @foreach ($routes as $route)
                        <option value="{{$route->id}}">{{$route->name}}</option>
                    @endforeach
                </select>
              </div>
            <div class="field">
              <label>Nombre de colonia</label>
              <input type="text" name="neighborhood" placeholder="Ejemplo:... Quezada" required>
            </div>
            <div class="field">
              <label>Hora de primer Acceso</label>
              <input type="time" name="firstTime" required>
            </div>
            <div class="field">
                <label>Ultima de primer Acceso</label>
                <input type="time" name="lastTime" required>
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

