@extends('templates/mainTemplate')

@section('title')
    Taxista
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
        {{-- Barra de busqueda --}}
        <div class="ui fluid action input">
            <input type="text" placeholder="Search...">
            <div class="ui button">Search</div>
        </div>
        {{-- Fin barra de busqueda --}}
        <table class="ui table">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Brands as $Brand)
                    <tr>
                        <td>
                            {{$Brand->name}}
                        </td>
                        <td>
                            <div class=" ui buttons fluid">
                                <button class="ui button yellow">Editar</button>
                                <div class="or"></div>
                                <button class="ui button black">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>    
          {{ $Brands->links() }}
    </div>
      
    {{-- Fin Columna numero 1   --}}
    </div>
    
  </div>
</div>
@endsection

