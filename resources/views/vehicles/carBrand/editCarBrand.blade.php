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
        <form class="ui form" method="POST" action="{{route('update-brand',$Brands->id)}}">
          @method('put')
            @csrf
            <table class="table ">
                <tr>
                    <td><label >Marca</label></td>
                    <td colspan="3">
                        <div class="field">
                            <input type="text" name="inputEditBrandName" value="{{old('inputEditBrandName',$Brands->name)}}" >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Acciones</td>
                    <td><button class="fluid ui yellow button" name="btn-update" id="btn-update" type="submit">
                        <i class="sync icon"></i>Actualizar</button></td>
                </tr>
            </table>
        </form>
      </div>
    {{-- Fin Columna numero 1   --}}
    </div>
    
  </div>
</div>
@endsection

