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
    <div class="container" >
        <div class="row">
            <div class="col-12" >

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

                            
                                <tr>
                            
                            
                            
                            

                            @if($cortes->status == '1')        
                                    <td>{{$item->person->id}}</td>
                                    <td>{{$cortes->id}}</td>
                                    <td>{{$item->person->identification}}</td>
                                    <td>{{$item->person->name}}</td>
                                    @if($item->percentage<10)
                                        <td>{{'0'.$item->percentage}}</td>
                                    @else
                                        <td>{{$item->percentage}}</td>
                                    @endif
                                    <td>{{$item->accrued_payments}}</td>
                                    <td>{{date('d-m-y')}}</td>
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
                                        <form action="{{route('do-cut',$cortes->id)}}" method="post">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="ui yellow button">
                                            Realizar corte</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @endif
                        
                    @endforeach
                @endforeach
                </table>

{{ $taxiDriver->links() }}
            </div>
        </div>
    </div>

@else
    <table class="ui yellow table"><br>
        <h3>No hay taxistas registrados para corte</h3>
    </table>

@endif
@endsection