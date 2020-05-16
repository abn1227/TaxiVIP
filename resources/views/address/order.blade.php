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
          {{-- warning --}}
          @if (session('msj'))
          <div class="alert alert-warning">
              {{session('msj')}}
          </div>
          @endif
          {{-- fin warning --}}
        <form action="{{route('availability')}}" class="ui form" method="POST">
            @csrf
                <div class="field">
                <b>Colonia Origen</b>
                <select class="ui search dropdown" name="origin" id="">
                    <option value="">Selecione punto de partida</option>
                    @foreach ($neighborhood as $item)
                        <option value="{{$item->id}}">{{$item->name_neighborhood}}</option>
                    @endforeach
                </select>
                </div>
                <br>
               <div class="field">
                <b>Colonia Destino</b>
                <select class="ui search dropdown" name="destination" id="">
                    <option value="">Selecione destino</option>
                    @foreach ($neighborhood as $item)
                        <option value="{{$item->id}}">{{$item->name_neighborhood}}</option>
                    @endforeach
                </select>
               </div>
     
                
    
                <br>
                <table class="ui table">
                    <tr>
                        <td>
                            <button class="ui button teal fluid" type="submit">
                                <i class="info icon"></i>Disponibilidad</button>
                        </td>
                        <td>
                            <button class="ui button blue fluid" id="order" type="button">
                                <i class="plus icon"></i> Crear Orden</button>
                        </td>
                    </tr>
                </table>
        </form>
        {{-- @include('address/orderModal') --}}
        @includeWhen(isset($taxiDrivers), 'address/orderModal')
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
//----------------------------------------------------------------------------------------------------------
//Calculo del precio 
//----------------------------------------------------------------------------------------------------------
$("#c").click(function() {
    //Verificar hora
    var now = new Date($.now());
    var t1 = '06:00:00';
    var t2 = '18:00:00';
    var hour= now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
   // alert(typeof(hour)+','+typeof(t1)+','+typeof(t2));
   if (hour>=t1 && hour<t2) {
        var distance = $('#distance').val();
        distance++
        var p=15;
        var price= p*(distance);
        $("#price").val(price);
   } else {
        var distance = $('#distance').val();
        distance++
        var p=15;
        var d=2;
        var price= d*p*(distance);
        $("#price").val(price);
   }


   
});
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//modal
$("#order").click(
  function(){

 $('.ui.modal')
  .modal('show');
  }

);
//
</script>
    
@endsection

