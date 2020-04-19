@extends('templates.mainTemplate')

@section('head')
{{-- LEAFLET  --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<style type="text/css">
    #map {
        height: 200%;
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
    Bienvenido a el modulo de direcciones
</h5>
<div class="container">

    <form>
        <input type="hidden" name="lat" id="lat" size=12 value="">
        <input type="hidden" name="lon" id="lon" size=12 value="">
    </form>

    <div class="row mb-5">
        <div class="col-md-5">
            <b>Buscador de direcciones</b>
            <div class="ui search selection fluid dropdown">
                <input type="hidden" name="addr" id="addr" onkeyup="custom()">
                <i class="dropdown icon"></i>
                <div class="default text">Search a place...</div>
                <div class="menu" id="menu">
                </div>
            </div>

            <br>
            <b>Nombre de direccion</b>
            <div class="ui fluid input mt-2">
                <input type="text" placeholder="Nombre de direccion">
            </div>

            <br>
            <b>Coordenadas</b>
            <div class="ui fluid input mt-2">
                <input id="coordinates" name="coordinates" type="text" placeholder="Coordenadas">
            </div>
        </div>

        <div class="col-md-7">
            <div id="map"></div>
        </div>
    </div>

</div>
@endsection

@section('executionScripts')
<script>
    var dropdown = $('.ui.dropdown')
    dropdown.dropdown({
        onChange: (value, text) => {
            let array = value.split(',');
            let lat = parseFloat(array[0], 10);
            let lon = parseFloat(array[1], 10);
            chooseAddr(lat, lon)
        }
    });


    dropdown.on('keydown', (e) => {
        let query;
        if (e.which == 13) {
            query = $('input.search').val();
            dropdown.addClass('loading');
            dropdown.addClass('disabled');
            $.ajax({
                url: `https://nominatim.openstreetmap.org/search?format=json&limit=3&q=${query},Honduras`,
                success: (res) => {
                    let menu = $('#menu');
                    menu.empty();
                    console.log(res);
                    res.map(e => {
                        return {
                            text: e.display_name,
                            value: [e.lat, e.lon],
                        }
                    }).forEach(e => {
                        menu.append(`<div class="item" data-value=${e.value}>${e.text}</div>`)
                    });
                    dropdown.removeClass('loading');
                    dropdown.removeClass('disabled');
                }
            });
        }
    })
    // var startlat = 14.059781;
    // var startlon = -87.219243;
    let options = {
        center: [14.059781, -87.219243],
        zoom: 12
    }

    // document.getElementById('lat').value = startlat;
    // document.getElementById('lon').value = startlon;

    let map = L.map('map', options);
    let nzoom = 12;

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoiYWJuYWlyIiwiYSI6ImNrNmQ3NW1rNDFhZHIzbG4zcndjZDlpMmUifQ.oFrOAXNmucIGc9n96Y0yyw'
    }).addTo(map);

    var myMarker = L.marker([14.059781, -87.219243], {
        title: "Coordinates",
        alt: "Coordinates",
        draggable: true
    }).addTo(map).on('dragend', function() {
        var lat = myMarker.getLatLng().lat.toFixed(8);
        var lon = myMarker.getLatLng().lng.toFixed(8);
        var czoom = map.getZoom();
        if (czoom < 18) {
            nzoom = czoom + 2;
        }
        if (nzoom > 18) {
            nzoom = 18;
        }
        if (czoom != 18) {
            map.setView([lat, lon], nzoom);
        } else {
            map.setView([lat, lon]);
        }
        document.getElementById('lat').value = lat;
        document.getElementById('lon').value = lon;
        $('#coordinates').val(lat + ' ' + lon);
        myMarker.bindPopup("Latitud: " + lat + "<br />Longitud: " + lon).openPopup();
    });

    function chooseAddr(lat1, lng1) {
        myMarker.closePopup();
        map.setView([lat1, lng1], 15);
        myMarker.setLatLng([lat1, lng1]);
        lat = lat1.toFixed(8);
        lon = lng1.toFixed(8);
        document.getElementById('lat').value = lat;
        document.getElementById('lon').value = lon;
        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
        $('#coordinates').val(lat + ' ' + lon);
    }
</script>

</script>
@endsection
