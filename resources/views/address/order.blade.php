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
                <div class="ui search selection fluid dropdown">
                    <input type="hidden" name="addr" id="addr" onkeyup="custom()">
                    <i class="dropdown icon"></i>
                    <div class="default text">Search a place...</div>
                    <div class="menu" id="menu">
                    </div>
                </div>
                </div>
                <br>
               <div class="field">
                <b>Colonia Destino</b>
                <div class="ui search selection fluid dropdown">
                    <input type="hidden" name="addr" id="addr" onkeyup="custom()">
                    <i class="dropdown icon"></i>
                    <div class="default text">Search a place...</div>
                    <div class="menu" id="menu">
                    </div>
                </div>
               </div>
    
                <br>
                <div class="field"> 
                    <b>Distancia</b>
                <div class="ui fluid input ">
                    <input type="text"  disabled>
                </div>
                </div>
    
                <br>
                <div class="fluid">
                    <b>Precio</b>
                <div class="ui fluid input mt-2">
                    <input type="text" disabled>
                </div>
                </div>
    
                <br>
                <table class="ui table">
                    <tr>
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

