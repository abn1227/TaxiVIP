<div style="margin-left: 250px; height: 480px; margin-top: 50px; " class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      Taxista
    </div>
    <div class="image content">
      <div class="ui medium image">
        <img src="{{asset('img\taxista-ciudad.jpg')}}">
      </div>
      <div class="description scrolling content " style="width: 500px; height: 300px">
        <div class="ui header">Informacion personal </div>
        <!--
            Formulario para el ingreso de informacion del taxista
        -->
      <form class="ui form" method="POST" action="{{route('new-taxidriver')}}">
            @csrf

            <div class="field">
            <input type="hidden" name="inputIdPerson" value="{{$id}}">
              </div>

            <div class="field">
              <label>porcentaje</label>
              <input type="text" name="inputPercentaje" placeholder="ejemplo... 25">
            </div>
            <div class="field">
              <label>Vencimiento de licensia</label>
              {{-- Calendario --}}
             <input type="date" name="inputCurrentDriverLicense">
              {{-- Fin Calendario --}}
            </div>
            <!--
            Radio botones
            -->
            <div class="ui form">
                <div class="inline fields">
                  <label>Fecha Corte</label>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="cut" value="1">
                      <label>Diario</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="cut" value="2">
                      <label>Semanal</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="cut" value="3">
                      <label>Quincenal</label>
                    </div>
                  </div>
                </div>
              </div>
            <!--Fin radiobotones-->

            <div class="ui header">Vehiculo </div>
            <div class="field">
              <label>Marca</label>
              <input type="text" name="carBrand" placeholder="ejemplo... Toyota">
            </div>
            <div class="field">
              <label>Modelo</label>
              <input type="text" name="model" placeholder="ejemplo... hatchback">
            </div>
            <div class="field">
              <label>Color</label>
              <input type="text" name="color" placeholder="ejemplo... Rojo">
            </div>
            <div class="field">
              <label>Placa</label>
              <input type="text" name="licensePlate" placeholder="Ejemplo... H AB 2649"> 
            </div>
            

            <button type="submit" name="btnTaxiDriving"  class="ui blue button">Guardar</button>

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