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
    {{-- Seleccionar Marca --}}
    <select class="ui search dropdown fluid" name="selectCarBrand">
        <option value="">Marcas</option>
        @foreach ($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach                        
      </select>
      {{-- Fin seleccionar Marca --}}
     
    
        <table class="ui table">
           <thead>
               <tr>
                   <th>Marca</th>
                   <th>Modelo</th>
               </tr>
           </thead>
            <tbody>
              @foreach ($models as $model)
                  <tr>
                      <td>{{$model->car_brand->name}}</td>
                      <td>{{$model->name}}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>    
    </div>
      
    {{-- Fin Columna numero 1   --}}
    </div>
    
  </div>
</div>
@endsection

