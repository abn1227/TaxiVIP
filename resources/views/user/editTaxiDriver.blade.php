@extends('templates/mainTemplate')

@section('title')
    Taxista
@endsection

@section('body')
@extends('templates/navBarAdmin')
@switch($taxiDriver->cut_date)
    @case(1)
        <?php $corte='Diario' ?>
        @break
    @case(2)
        <?php $corte='Semanal' ?>
        @break
    @case(3)
        <?php $corte='Quincenal' ?>
        @break
    @default
   
@endswitch
<div class="container" >
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
  <div class="container" >
    <div class="row">
      {{-- Imagen taxista  --}}
      <div class="col-lg-6" align="left" >
        <img src="{{ asset('img/taxista.jpg') }}" >
      </div>
      {{-- Fin imagen --}}
      {{-- Datos taxista --}}

      <div class="col-lg-6" style="padding-top:20px; ">
      <form action="{{route('update-taxidriver',$taxiDriver->id)}}" method="post">
        @method('put')
        @csrf
       <table class="ui yellow table">
        <thead>
          <th>Campo</th>
          <th>Datos</th>
        </thead>
        <tbody>
          <tr>
            <td><label >Indentificacion</label></td>
            <td>
              <input type="text" class="form-control"
                      name="inputTaxiDriverIdentification" 
                      value="{{old('inputTaxiDriverIdentification',$taxiDriver->person->identification)}}">
            </td>
          </tr>
          <tr>
            <td><label >Nombre</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputTaxiDriverName" 
              value="{{old('inputTaxiDriverName',$taxiDriver->person->name)}}"> 
            </td>
          </tr>
          <tr>
            <td><label >Celular</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputTaxiDriverMobile" 
              value="{{old('inputTaxiDriverMobile',$taxiDriver->person->mobile)}}">
            </td>
          </tr>
          <tr>
            <td><label >Licencia</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputTaxiDriverLicense" 
              value="{{old('inputTaxiDriverLicense',$taxiDriver->driving_license)}}">
            </td>
          </tr>
          <tr>
           
          </tr>
          <tr>
            <td><label >Fecha de corte</label></td>
            <td>
              <!--
            Radio botones
            -->
            <div class="ui form">
              <div class="inline fields">
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="cut" value="1"
                    @if ($taxiDriver=='1')
                        check
                    @endif
                    >
                    <label>Diario</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="cut" value="2"
                    {{ old('cut',$taxiDriver->status) == '2' ? 'checked' : '' }}
                    >
                    <label>Semanal</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="cut" value="3"
                    {{ old('cut',$taxiDriver->status) == '3' ? 'checked' : '' }}
                    >
                    <label>Quincenal</label>
                  </div>
                </div>
              </div>
            </div>
          <!--Fin radiobotones-->
            </td>
          </tr>
          <tr>
            <td><label >Email</label></td>
            <td>
              <input type="text" class="form-control"
              name="inputTaxiDriverEmail" 
              value="{{old('inputTaxiDriverEmail',$user->email)}}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
               <button type="submit" class="btn btn-warning btn-block">Actualizar</button>
            </td>
          </tr>
        </tbody>
       </table>
      </form>
      </div>

      {{-- Fin datos taxista --}}
    </div>
    
  </div>
    
</div>
@endsection
@section('executionScripts')
<script>

//radiobotones
$('.ui.radio.checkbox')
  .checkbox()
;
//
</script>
@endsection