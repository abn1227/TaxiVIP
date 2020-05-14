@extends('templates.mainTemplate')

@section('title')
Address
@endsection

@section('body')
@extends('templates.navBar')

<h5>
    Bienvenido a el modulo de direcciones
</h5>
<div class="container">
<div class="row">
    {{-- Columna derecha --}}
    <div class="col-lg-6">
        {{-- Guardado exitoso --}}
        @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
        @endif
        {{-- fin guardado exitoso --}}
        {{-- Formulario --}}
        <form class="ui form" action="{{route('save-addresses')}}" method="post">
            @csrf
            <div class="field">
              <label>Nombre de colonia</label>
              <input type="text" name="neighborhood" placeholder="Ejemplo:... Quezada" required>
            </div>
            <div class="field">
              <label>Hora de primer Acceso</label>
              <input type="time" name="firstTime" required>
            </div>
            <div class="field">
                <label>Ultima de primer Acceso</label>
                <input type="time" name="lastTime" required>
              </div>
            <button class="ui button blue fluid" type="submit">
                <i class="save icon"></i> Guardar</button>
          </form>
        {{-- Fin Formulario --}}
    </div>
    {{-- Fin columna derecha --}}
    {{-- Columna Izquierda --}}
    <div class="col-lg-6">
        <img src="{{ asset('img/map.png') }}" alt="" style="height: 500px; width: 500px;">
    </div>
    {{-- Fin columna izquierda --}}
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
