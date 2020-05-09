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
        <form class="ui form" method="POST" action="{{route('update-model',$model->id)}}">
            @method('put')
            @csrf
            <table class="table ">
                  <tr>
                    <td><label >Marca</label></td>
                    <td colspan="3">
                      <select class="ui search dropdown" name="editSearchCarBrand">
                        <option value="">Marcas</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}" 
                                {{old('searchCarBrand',$brand->id) == "$model->car_brands_id" ? "selected" : "" }}>{{$brand->name}}</option>
                        @endforeach                        
                      </select>
                    </td>
                </tr>
                <tr>
                    <td><label >Modelo</label></td>
                    <td colspan="3">
                     <input type="text" name="editCarModel" value="{{old('carModel',$model->name)}}">                        
                    </td>
                </tr>
                <tr>
                    <td>Acciones</td>
                    <td><button class="fluid ui yellow button" name="btn-update" id="btn-update" type="submit">
                        <i class="sync icon"></i>Actualizar</button></td>
            </table>
        </form>
      </div>
    {{-- Fin Columna numero 1   --}}
    </div>
    
  </div>
</div>
@endsection

