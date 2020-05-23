@extends('templates.mainTemplate')
@section('title')
Orden
@endsection

@section('body')
@extends('templates.navBar')
@switch($order->canceled)
    @case('0')
        <?php $status='pendiente'?>
        @break
    @case('1')
        <?php $status='concluído'?>
        @break
    @case('2')
        <?php $status='cancelado'?>
        @break
    @default
        
@endswitch
<h5>
    Historial de carreras
</h5>
<hr>
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
          <div class=" ui segments">
              <div class="ui segment blue">
                <div class="ui equal width form">
                    <div class="fields">
                      <div class="field">
                        <label>Cliente</label>
                        <input type="text" placeholder="N/A" readonly value="{{$order->client->person->name}}">
                      </div>
                      <div class="field">
                        <label>Celular</label>
                        <input  type="text" readonly value="{{$order->client->person->mobile}}">
                      </div>
                    </div>
                    <div class="fields">
                        <div class="field">
                            <label>Taxista</label>
                            <input type="text" readonly value="{{$order->taxiDriver->person->name}}">
                        </div>
                        <div class="field">
                            <label>Fecha</label>
                            <input type="text"  name="date" value="{{old('date',$order->date)}}">
                        </div>
                        
                    </div>
                  </div>
                  <div class="ui equal width form">
                    <div class="fields">
                        <div class="field">
                            <label> Distancia</label>
                            <input type="text" readonly value="{{$order->distance}}">
                        </div>
                        <div class="field">
                            <label>Precio</label>
                            <input type="text" readonly value="{{$order->price}}">
                        </div>
                        <div class="field">
                            <label>Estado</label>
                            <input type="text" readonly value="{{$status}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field">
                            <a  class="button ui teal fluid" href="{{$order->url_map}}" target="_blank">URL</a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
          
    </div>
    <div class="col-md-6">
        @include('templates/orderMenu')
        <img src="{{ asset('img/mapa.jpg') }}" style="height: 350px;" class="ui fluid image">
    </div>
</div>
   
</div>
@endsection
