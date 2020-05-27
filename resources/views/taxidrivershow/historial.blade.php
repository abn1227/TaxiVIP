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
        
@if(1)
    <div class="container" >
        <div class="row">
            <div class="col-12" >

                <table class="ui yellow table table-striped">
                <thead>
                    <tr>
                    <th>Identidad</th>
                    <th>Nombre</th>
                    <th>Porcentaje %</th>
                    <th>Ingresos percibidos</th>
                    <th>Total a pagar</th>
                    <th>Fecha de corte</th>
                    <th>Multa</th>
                    <th>Total a pagar</th>
                    <th>Acción</th>
                    </tr>
                </thead>
                @foreach ($cut as $item)
                    
                        
                                <tbody>

                            
                            <td>{{$item->payment}}</td>
                            <td>{{$item->id}}</td>
                            
                                </tbody>
                            
                            
                        
                    
                @endforeach
                </table>


            </div>
        </div>
    </div>

@else

    {{$user->id}}
    <table class="ui yellow table"><br>
        <h3>No tiene pagos registrados por carreras asignadas</h3>
    </table>
@endif

@endsection