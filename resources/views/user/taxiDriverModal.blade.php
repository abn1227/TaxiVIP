<div style="margin-left: 250px; height: 480px; margin-top: 50px; " class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      Taxista
    </div>
    <div class="image content">
      <div class="ui medium image">
        <img src="{{asset('img\taxista-ciudad.jpg')}}">
      </div>
      <div class="description" style="width: 500px;">
        <div class="ui header">Informacion personal </div>
        <!--
            Formulario para el ingreso de informacion del taxista
        -->
      <form class="ui form" method="POST" action="{{route('new-taxiDriver')}}">
            @csrf
            <div class="field">
              <label>Licencia de conducir</label>
              <input type="text" name="inputDrivingLicense" placeholder="Licencia de conducir">
            </div>

            <div class="field">
                <label>Licencia de conducir</label>
            <input type="hidden" name="inputIdPerson" value="{{$id}}">
              </div>

            <div class="field">
              <label>porcentaje</label>
              <input type="text" name="inputPercentaje" placeholder="porcentaje">
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
            <button type="submit" name="btnTaxiDriving"  class="ui blue button">Guardar</button>

          </form>
        <!--
           Fin Formulario
        -->
      </div>
    </div>
    <div class="actions">
      <div class="ui black deny button">
        Nope
      </div>
      <div class="ui positive right labeled icon button">
        Yep, that's me
        <i class="checkmark icon"></i>
      </div>
    </div>
  </div>