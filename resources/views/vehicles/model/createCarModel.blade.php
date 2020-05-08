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
 
      <div class="col-lg-8" style="padding-top:30px; ">
        <form class="ui form" method="POST" action="{{route('model-save')}}">
            @csrf
            <table class="table ">
                  <tr>
                    <td><label >Marca</label></td>
                    <td colspan="3">
                      <select class="ui search dropdown" name="searchCarBrand">
                        <option value="">Marcas</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach                        
                      </select>
                    </td>
                </tr>
                <tr>
                    <td><label >Modelo</label></td>
                    <td colspan="3">
                     <input type="text" name="carModel" value="{{old('carModel')}}">                        
                    </td>
                </tr>
                <tr>
                    <td>Acciones</td>
                    <td><button class="fluid ui blue button" name="btn-save" id="btn-save" type="submit">
                        <i class="save icon"></i>Guardar</button></td>
                    <td><button class="fluid ui black button" name="btn-model" id="btn-model" type="reset">
                        <i class="eraser icon"></i>Limpiar</button></td>
                </tr>
            </table>
        </form>
      </div>
    {{-- Fin Columna numero 1   --}}
    </div>
    
  </div>
</div>
@endsection

