<div style="margin-left: 250px; height: 550px; margin-top: 50px; " class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      Orden
    </div>
    <div class="image content">
      <div class="ui medium image">
        <img src="{{asset('img\taxista-ciudad.jpg')}}">
      </div>
      <div class="description scrolling content " style="width: 500px; height: 380px">
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
                       <input type="text" name="distance" id="distance" required value="{{old('price')}}">
                    </td>
                    <td>
                      <button class=" ui green button fluid" id="c" type="button" onclick="price()">
                        <i class="icon money"></i>Calcular precio
                      </button>
                    </td>
                  </tr>
                </table>
                
                
              </div>

            <div class="field">
              <label>Precio</label>
              <input type="text" name="price" id="price" readonly required >
            </div>

            <div class="field">
              <label>URL</label>
              <input type="text" name="url" id="url" required value="{{old('url')}}">
            </div>
            
            <div class="field">
                <label>Taxista</label>
                <label >
                  @foreach ($taxiDrivers as $taxiDriver)
                    <input type="hidden" name="taxiDriver" value="{{$taxiDriver->id}}">
                    <input type="text" readonly value="{{$taxiDriver->person->name.' / '.$taxiDriver->person->mobile}}">
                    @break
                  @endforeach
                </label>
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