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
      <form class="ui form" method="POST" action="{{route('new-taxidriver')}}" >
            @csrf

            <div class="field">
            <input type="hidden" name="inputIdPerson" value="{{old('inputIdPerson',$id)}}" >
              </div>

            <div class="field">
              <label>porcentaje</label>
              <input type="number" name="inputPercentaje" placeholder="ejemplo... 25" required value="{{old('inputPercentaje')}}"
              min="10" max="20">
            </div>
            <div class="field">
              <label>Vencimiento de licencia</label>
              {{-- Calendario --}}
             <input type="date" name="inputCurrentDriverLicense" required value="{{old('inputCurrentDriverLicense')}}">
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
                      <input type="radio" name="cut" value="1"
                      {{ old('cut') == "1" ? "checked" : "" }}>
                      <label>Diario</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="cut" value="2"
                      {{ old('cut') == "2" ? "checked" : "" }}>
                      <label>Semanal</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input type="radio" name="cut" value="3"
                      {{ old('cut') == "3" ? "checked" : "" }}>
                      <label>Quincenal</label>
                    </div>
                  </div>
                </div>
              </div>
            <!--Fin radiobotones-->

            {{-- Seleccionar ruta --}}
            <div class="field">
              <label>Ruta</label>
              <select class="ui search dropdown" name="route" required>
                <option value="">Rutas</option>
                @foreach ($routes as $route)
                    <option value="{{$route->id}}" 
                      {{old('route') == "$route->id" ? "selected" : "" }}
                      >{{$route->name}}</option>
                @endforeach                        
              </select>
            </div>
            {{-- Fin seleccionar Ruta --}}

            <div class="ui header">Vehiculo </div>

            <div class="field">
              <label>Modelo</label>
              <select class="ui search dropdown" name="model" required>
                <option value="">Modelos</option>
                @foreach ($models as $model)
                    <option value="{{$model->id}}" 
                      {{old('model') == "$model->id" ? "selected" : "" }}
                      >{{$model->name}}</option>
                @endforeach                        
              </select>
            </div>
            <div class="field">
              <label>Color</label>
              {{-- <input type="text" name="color" placeholder="ejemplo... Rojo" required value="{{old('color')}}"> --}}
              <select name="color" id="color" required>
                <option value="">Seleccione un color</option>
                <option value="Negro"{{ old('color') == "Negro" ? "selected" : "" }}>Negro</option>
                <option value="Rojo" {{ old('color') == "Rojo" ? "selected" : "" }}>Rojo</option>
                <option value="Azul" {{ old('color') == "Azul" ? "selected" : "" }}>Azul</option>
                <option value="Blanco" {{ old('color') == "Blanco" ? "selected" : "" }}>Blanco</option>
                <option value="Amarillo" {{ old('color') == "Amarillo" ? "selected" : "" }}>Amarillo</option>
                <option value="Verde" {{ old('color') == "Verde" ? "selected" : "" }}>Verde</option>
                <option value="Gris" {{ old('color') == "Gris" ? "selected" : "" }}>Gris</option>
                <option value="Marrón" {{ old('color') == "Marrón" ? "selected" : "" }}>Marrón</option>
                <option value="Plateado" {{ old('color') == "Plateado" ? "selected" : "" }}>Plateado</option>
                <option value="Morado" {{ old('color') == "Morado" ? "selected" : "" }}>Morado</option>
                <option value="Oliva" {{ old('color') == "Oliva" ? "selected" : "" }}>Oliva</option>
              </select>
            </div>
            <div class="field">
              <label>Año</label>
              <select name="year" id="year" class="ui search dropdown" >
                <option value="">Año del vehículo</option>
              @for ($i = 2006; $i < 2017; $i++)
                  <option value="{{$i}}"
                  {{old('year') == "$i" ? "selected" : ""}}> {{$i}}</option>
              @endfor
            </select>
            </div>
            <div class="field">
              <label>Placa</label>
              <input type="text" name="licensePlate" placeholder="Ejemplo... H AB 2649" value="{{old('licensePlate')}}" required> 
            </div>
            

            <button type="submit" name="btnTaxiDriving"  class="ui blue button">
              <i class="save icon"></i>Guardar</button>

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