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

@if(!$taxiDriver->isEmpty())
    <table class="ui yellow table table-striped">
    <thead>
        <tr>
        <th>identidad</th>
        <th>Name</th>
        <th>Celular</th>
        <th>Porcentaje</th>
        <th>Fecha de corte</th>
        <th>Informacion</th>
        </tr>
    </thead>
    @foreach ($taxiDriver as $item)
        @foreach($item->cut as $cortes)
            @switch($item->cut_date)
                @case(1)
                    <?php $corte=1 ?>
                    @break
                @case(2)
                    <?php $corte=7 ?>
                    @break
                @case(3)
                    <?php $corte=15 ?>
                    @break
                @default
                    
            @endswitch

                <tbody>
            
            @if( $item->cut_date)
                <tr>
            @else
                <tr>
            @endif
                    
                    <td class="table-warning">{{$item->person->id}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->person->identification}}</td>
                    <td>{{$item->person->name}}</td>
                    @if($item->percentage<10)
                        <td>{{'0'.$item->percentage}}</td>
                    @else
                        <td>{{$item->percentage}}</td>
                    @endif
                    <td>{{$item->accrued_payments}}</td>
                    <td>{{$item->cut}}</td>
                    <td>{{$cortes->payment}}</td>
                    <!--td>{{$item->cut}}</td-->
                    <td>{{$corte}}</td>
                    @switch($corte)
                        @case(1)
                            <td>{{$item->person->created_at->modify('+1 day')->format('d/m/y')}}</td>
                            @break
                        @case(7)
                            <td>{{$item->person->created_at->modify('+7 day')->format('d/m/y')}}</td>
                            @break
                        @case(15)
                            <td>{{$item->person->created_at->modify('+15 day')->format('d/m/y')}}</td>
                            @break
                    @endswitch
                    
                    <td>
                    <a href="{{route('do-cut',$item->id)}}" class="ui yellow button"> Realizar corte </a>
                    </td>
                </tr>
                </tbody>

        @endforeach
    @endforeach
    </table>
{{ $taxiDriver->links() }}

@else
    <table class="ui yellow table"><br>
        <h3>No hay taxistas registrados para corte</h3>
    </table>

@endif
@endsection