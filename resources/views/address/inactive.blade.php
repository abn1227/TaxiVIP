@extends('templates.mainTemplate')
@section('title')
Orden
@endsection

@section('body')
@extends('templates.navBar')
<h5>
    Bienvenido a el modulo de carreras
</h5>
       
<div class="container">
<div class="row">
    <div class="col-md-6">
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
         @foreach ($taxiDrivers as $taxiDriver)
        <form action="{{route('status',$taxiDriver->id)}}" class="ui form" method="POST">
            @method('put')
            @csrf
       <table class="ui table blue">
          
            <tr>
                <td><strong>Taxista:</strong></td>
                <td>{{$taxiDriver->person->name}}</td>
            </tr>
            <tr>
              <td>
                <label><strong>Estado:</strong></label>
              </td>
              <td>
                <div class="ui radio checkbox">
                  <input type="radio" name="status" value="0" tabindex="0" class="hidden" 
                  {{ old('status',$taxiDriver->status) == "0" ? "checked" : "" }}>
                  <label>Inactivo</label>
                </div>
              </td>
              <td>
                <div class="ui radio checkbox">
                  <input type="radio" name="status" value="1" tabindex="0" class="hidden"
                  {{ old('status',$taxiDriver->status) == "1" ? "checked" : "" }}>
                  <label>Activo</label>
                </div>
              </td>
            </tr>
           <tr>
               <td colspan="4">
                   <button class="ui button green fluid" type="submit">
                       <i class="sync icon"></i> Actualizar
                    </button>
               </td>
           </tr>
         
           
       </table>
    </form>
    @endforeach
    {{$taxiDrivers->links()}}
    </div>
    <div class="col-md-6">
        @include('templates/orderMenu')
        <img src="{{ asset('img/mapa.jpg') }}" style="height: 350px;" class="ui fluid image">
    </div>
</div>
   
</div>
@endsection

@section('executionScripts')
<script>
//radiobotones
$('.ui.radio.checkbox')
  .checkbox()
;
//

</script>
    
@endsection
