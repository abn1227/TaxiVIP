@extends('templates.mainTemplate')

@section('title')
Route
@endsection

@section('body')
@extends('templates.navBar')

<h2>
    Listado de colonias
</h2>
<div class="container">
<div class="row">
    {{-- Columna derecha --}}
    <div class="col-lg-7">
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
        {{-- Mostrar en un acordion de las colonias --}}
        <div class="ui styled fluid accordion">
        @foreach ($neighborhoods as $neighborhood)
            <div class="title"><i class="dropdown icon"></i> {{$neighborhood->name_neighborhood}} </div>
            <div class="content">
                <table class="transition hidden ui table teal">
                    <tr>
                        <td><strong>Inicio de jornada</strong></td>
                        <td>
                            {{$neighborhood->start_time}}
                        </td>
                        <td><strong>Fin de jornada</strong></td>
                        <td>{{$neighborhood->end_time}}</td>
                        <td>
                            <a class="ui button teal fluid" href="{{route('edit-neighborhoods',$neighborhood->id)}}"><i class="edit icon"></i> Editar </a>
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    </div>
            
            
            
          
        {{-- Fin mostrar colonias --}}
    </div>
    {{-- Fin columna derecha --}}
    {{-- Columna Izquierda --}}
    <div class="col-lg-5">
        @include('templates/neighborhoodMenu')
        <img src="{{ asset('img/map.png') }}" alt="" class="ui fluid image">
    </div>
    {{-- Fin columna izquierda --}}
</div>
</div>
@endsection
@section('executionScripts')
<script>
$('.ui.accordion')
  .accordion({
    selector: {
      trigger: '.title .icon'
    }
  })
;

</script>
    
@endsection

