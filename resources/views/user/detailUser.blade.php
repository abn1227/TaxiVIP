@extends('templates/mainTemplate')

@section('title')
    User
@endsection

@section('body')
@extends('templates/navBar')
 {{-- Actualizacion exitosa --}}
 @if (session('mensaje'))
 <div class="alert alert-success">
     {{session('mensaje')}}
 </div>
@endif
{{-- fin Actualizacion exitosa --}}
<div class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col-sm-6" align="center" >
    <img src="{{ asset('img/recepcionista.jpg') }}" class="ui fluid image" style="width: 250px; height: 400px;" >
    </div>
    <div class="col-sm-6" >
     
    <form method="get"  action="{{route('user')}}" class="form ui"> 
    @csrf
        <table class="ui yellow table">
            <thead>
                <tr>
                    <th colspan="2">
                        <h2 align="center">Datos Personales</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>Identificacion</td>
                <td>{{$person->identification }}</td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td>{{$person->name }}</td>
            </tr>
            <tr>
                <td>Email address</td>
                <td> {{ $user->email }}</td>
            </tr>
            <tr>
                <td>Celular</td>
                <td>{{ $person->mobile }}</td>
            </tr>
            </tbody>
        </table>

        
        <button type="submit" name="inputUpdate" class="btn btn-warning btn-block">Editar</button>
    </form>




    </div>
  </div>
  
</div>
  

@endsection
