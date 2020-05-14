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
        <form action="" class="ui form">
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
                            <button class="ui button teal fluid" type="button">
                                <i class="info icon"></i>Disponibilidad</button>
                        </td>
                        <td>
                            <button class="ui button blue fluid" id="order" type="button">
                                <i class="plus icon"></i> Crear Orden</button>
                        </td>
                    </tr>
                </table>
        </form>
        @include('address/orderModal')
    </div>
    <div class="col-md-6">
        <img src="{{ asset('img/mapa.jpg') }}" alt="" style="width: 550px; height: 450px;">
    </div>
</div>
   
</div>
@endsection

@section('executionScripts')

<script>
    $('.clearable.example .ui.selection.dropdown')
  .dropdown({
    clearable: true
  })
;
$('.clearable.example .ui.inline.dropdown')
  .dropdown({
    clearable: true,
    placeholder: 'any'
  })
;

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

