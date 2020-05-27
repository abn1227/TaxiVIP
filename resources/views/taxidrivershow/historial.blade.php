@extends('templates/mainTemplate')

@section('title')
    Corte de Conductores
@endsection

@section('body')
@extends('templates/navBar')
 {{-- Guardado exitoso --}}
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        @endif
        {{-- fin guardado exitoso --}}


    <table class="ui yellow table"><br>
        <h3>No hay taxistas registrados para corte</h3>
    </table>

@endif
@endsection