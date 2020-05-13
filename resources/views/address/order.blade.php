@extends('templates.mainTemplate')

@section('head')
{{-- LEAFLET  --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" 
integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" 
crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" 
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" 
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<style type="text/css">
    #map {
        height: 120%;
        padding: 0;
        margin: 0;
    }

    .address {
        cursor: pointer
    }

    .address:hover {
        color: #AA0000;
        text-decoration: underline
    }
</style>

@endsection
@section('title')
Home
@endsection

@section('body')
@extends('templates.navBar')
<h5>
    Bienvenido a el modulo de carreras
</h5>
<div class="container">
<div class="row">
    <div class="col-md-5">
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
    <div class="col-md-7">
        <div id="map"></div>
    </div>
</div>
   
</div>
@endsection

@section('executionScripts')
<script>
//----------------------------------------------------------------------    
//modal
//----------------------------------------------------------------------
$("#order").click(
  function(){

 $('.ui.modal')
  .modal('show');
  }

);

//----------------------------------------------------------------------
//Mapa
//----------------------------------------------------------------------
    let options = {
        center: [14.059781, -87.219243],
        zoom: 12
    }

    let map = L.map('map', options);
    let nzoom = 12;

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoiYWJuYWlyIiwiYSI6ImNrNmQ3NW1rNDFhZHIzbG4zcndjZDlpMmUifQ.oFrOAXNmucIGc9n96Y0yyw'
    }).addTo(map);

        // L.Routing.control({
        // waypoints: [
        //     L.latLng(14.0539, -87.1224),
        //     L.latLng(14.0818005 , -87.20681)
        // ],
        // routeWhileDragging: true
        // }).addTo(map);

     L.Routing.control({
	waypoints: [
		L.latLng(14.0539, -87.1224),
		L.latLng(14.0818005 , -87.20681)
    ],
    
    routeWhileDragging: true,
    reverseWaypoints: true,
	showAlternatives: true,
    altLineOptions: {
		styles: [
			{color: 'black', opacity: 0.15, weight: 9},
			{color: 'white', opacity: 0.8, weight: 6},
			{color: 'blue', opacity: 0.5, weight: 2}
		]
	}
	
}).addTo(map);
    
</script>


@endsection
