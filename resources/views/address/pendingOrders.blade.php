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
         @foreach ($orders as $order)
        <form action="{{route('update-order',$order->id)}}" class="ui form" method="POST">
            @method('put')
            @csrf
       <table class="ui table yellow">
          
            <tr>
                <td><strong>Taxista:</strong></td>
                <td>{{$order->taxiDriver->person->name}}</td>
            </tr>
            <tr>
              <td>
                <label><strong>Estado:</strong></label>
              </td>
              <td>
                <div class="ui radio checkbox">
                  <input type="radio" name="canceled" value="0" tabindex="0" class="hidden" 
                  {{ old('canceled',$order->canceled) == "0" ? "checked" : "" }}>
                  <label>Pendiente</label>
                </div>
              </td>
              <td>
                <div class="ui radio checkbox">
                  <input type="radio" name="canceled" value="1" tabindex="0" class="hidden"
                  {{ old('canceled',$order->canceled) == "1" ? "checked" : "" }}>
                  <label>Concluído</label>
                </div>
              </td>
              <td>
                <div class="ui radio checkbox">
                  <input type="radio" name="canceled" value="2" tabindex="0" class="hidden"
                  {{ old('canceled',$order->canceled) == "2"? "checked" : "" }}>
                  <label>Cancelado</label>
                </div>
              </td>
            </tr>
           <tr>
               <td colspan="4">
                   <button class="ui button yellow fluid" type="submit">
                       <i class="sync icon"></i> Actualizar
                    </button>
               </td>
           </tr>
         
           
       </table>
    </form>
    @endforeach
    </div>
    <div class="col-md-6">
        @include('templates/orderMenu')
        <img src="{{ asset('img/mapa.jpg') }}" style="height: 350px;" class="ui fluid image">
    </div>
</div>
{{$orders->links()}}
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
