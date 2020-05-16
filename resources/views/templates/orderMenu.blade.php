<div class="ui stackable menu" >
  <div class="item">
    <img src="{{ asset('img/ubicacion.jpeg') }}" style="height: 30px; width: 30px">
  </div>
  <a class="item" href="{{route('order')}}">Crear ordenes</a>
  <a class="item" href="{{route('pending')}}" >Ordenes pendientes</a>
  <a class="item" href="{{route('inactive')}}">Taxistas inactivos</a>
</div>