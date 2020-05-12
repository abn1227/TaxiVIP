<div style="margin-left: 250px; height: 480px; margin-top: 50px; " class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      Orden
    </div>
    <div class="image content">
      <div class="ui medium image">
        <img src="{{asset('img\taxista-ciudad.jpg')}}">
      </div>
      <div class="description scrolling content " style="width: 500px; height: 300px">
        <div class="ui header">Detalle de la orden </div>
        <!--
            Formulario para el ingreso de informacion del taxista
        -->
      <form class="ui form" method="POST" action="{{route('new-taxidriver')}}" >
            @csrf

            <div class="field">
            <input type="hidden" name="inputIdPerson" value="{{old('inputIdPerson')}}" >
              </div>

              <div class="field">
                <label>Fecha de la orden</label>
                {{-- Calendario --}}
               <input type="date" name="date" required value="{{old('date')}}" disabled>
                {{-- Fin Calendario --}}
              </div>

            <div class="field">
              <label>Precio</label>
              <input type="text" name="price" disabled required value="{{old('price')}}">
            </div>
            
            <div class="field">
                <label>Taxista</label>
                <select class="ui search dropdown" name="model" required>
                  <option value="">Seleccione un taxista</option>
                                    
                </select>
              </div>
            
              <div class="field">
                <button type="submit" class="ui button blue ">
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