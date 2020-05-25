@extends('templates.mainTemplate')
@section('title')
Orden
@endsection

@section('body')
@extends('templates.navBar')
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
          <table class="ui table blue">
            <thead>
                <th>n</th>
                <th>taxista</th>
                <th>cliente</th>
                <th>estado</th>
                <th>información</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                @switch($order->canceled)
                    @case('0')
                        <?php $status='pendiente'?>
                        @break
                    @case('1')
                        <?php $status='concluída'?>
                        @break
                    @case('2')
                        <?php $status='cancelada'?>
                        @break
                    @default
                        
                @endswitch
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->taxiDriver->person->name}}</td>
                        <td>{{$order->client->person->name}}</td>
                        <td>{{$status}}</td>
                        <td>
                            <a class="button ui fluid teal" href="{{route('detail-history',$order->id)}}">
                                <i class="info icon"></i> Detalle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{$orders->links()}}
    </div>
    <div class="col-md-6">
        @include('templates/orderMenu')
        <img src="{{ asset('img/mapa.jpg') }}" style="height: 350px;" class="ui fluid image">
    </div>
</div>
   
</div>
@endsection
