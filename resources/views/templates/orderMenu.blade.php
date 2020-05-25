<div class="ui stackable menu" >
  <div class="item">
    <a href="{{route('history')}}">
    <img src="{{ asset('img/historial.png') }}" style="height: 30px; width: 30px">
    </a>
  </div>
  <a class="item" href="{{route('order')}}">carrera nueva</a>
  <a class="item" href="{{route('pending')}}" >carreras pendientes</a>
  <a class="item" href="{{route('inactive')}}">estado de taxistas</a>
</div>