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
        
@if(!$cut->isEmpty())
    <div class="container" >
        <div class="row">
            <div class="col-12" >

                <table class="ui yellow table table-striped">
                <thead>
                    <tr>
                    <th>Porcentaje %</th>
                    <th>Pagos por comisión</th>
                    <th>Multas por retraso de pago</th>
                    <th>Fecha de corte</th>
                    </tr>
                </thead>
                @foreach ($cut as $item)
                    
                        
                                <tbody>

                            <td>{{$item->id}}</td>
                            <td>L. {{$item->payment}}</td>
                            <td>L. {{$item->penalty_fee}}</td>
                            <td>{{$item->updated_at->format('d-m-Y')}}</td>
                            
                                </tbody>
                            
                            
                        
                    
                @endforeach
                </table>
                {{ $cut->links() }}

            </div>
        </div>
    </div>

@else

    <table class="ui yellow table"><br>
        <h3>No tiene pagos registrados por carreras asignadas</h3>
    </table>
@endif

@endsection