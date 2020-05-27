<div style="margin-left: 250px; height: 550px; margin-top: 50px; " class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      Orden
    </div>
    <div class="image content">
      <div class="ui medium image">
        <img src="{{asset('img\taxista-ciudad.jpg')}}">
      </div>
      <div class="description scrolling content" style="width: 700px; height: 380px">
        {{-- <div class="ui header">Detalle de la orden </div> --}}
        <!--
            Formulario para el ingreso de informacion del taxista
        -->
      <form class="ui form" method="POST" action="{{route('save-order')}}" >
            @csrf           
              <div class="field">
                <label>Distancia</label>
                <table class="ui table">
                  <tr>
                    <td >
                       <input type="number" name="distance" id="distance" required value="{{old('distance')}}" min="0" step=".01">
                    </td>
                    <td>
                      <div class="ui checkbox">
                        <input type="checkbox" tabindex="0" class="hidden" name="terceraEdad" id="terceraEdad">
                        <label>Tercera edad</label>
                      </div>
                    </td>
                    <td>
                      <button class=" ui green button fluid" id="c" type="button" onclick="price()">
                        <i class="icon money"></i>Calcular precio
                      </button>
                    </td>
                  </tr>
                </table>
                
                
              </div>

            <div class="fields " style="width: 570px">
              <div class="field">
                <label>Precio</label>
                <input type="number" name="price" id="price" readonly required >
              </div>
              <div class="field">
                <label>Descuento</label>
                <input type="number" name="discount" id="discount" readonly required >
              </div>
              <div class="field">
                <label>Total</label>
                <input type="number" name="total" id="total" readonly required >
              </div>
            </div>
            
            <div class="field">
              <label>URL</label>
              <input type="text" name="url" id="url" required value="{{old('url')}}">
            </div>
            
            <div class="field">
                <label>Taxista</label>
                <label >
                  @foreach ($taxiDrivers as $taxiDriver)
                  <?php 
                  $vehicle=App\Vehicle::where([
                    ['taxi_drivers_id',$taxiDriver->id],
                    ['active','1']
                  ])->first();
                  ?>
                    <input type="hidden" name="taxiDriver" value="{{$taxiDriver->id}}">
                    <input type="text" readonly value="{{$taxiDriver->person->name.' / '.$taxiDriver->person->mobile}}">
                    @break
                  @endforeach
                </label>
              </div>
              <div class="field">
                <label>Placa del vehiculo</label>
              <input type="text" name="vehicle" value="{{ $vehicle->license_plate}}" readonly >
              </div>

              <div class="field">
                <label>Color del vehículo</label>
              <input type="text" name="vehicle" value="{{ $vehicle->color}}" readonly >
              </div>

              <div class="field">
                <label>Marca y modelo del vehículo</label>
              <input type="text" name="vehicle" value="{{$vehicle->carModel->car_brand->name.'/'. $vehicle->carModel->name}}" readonly >
              </div>

              <div class="field">
                <label>Celular cliente</label>
                <input type="text" name="phone" id="phone" required >
              </div>

              <div class="field">
                <label>Nombre</label>
                <input type="text" name="name" id="name" >
              </div>

              <div class="field">
                <button type="submit" class="ui button blue fluid">
                    <i class="save icon"></i> Guardar</button>
            </div>
          </form>
        <!--
           Fin Formulario
        -->
      </div>
    </div>

    <div class="actions">
      <div class="ui black deny button">
        Cerrar
      </div>
     
    </div>
  </div>