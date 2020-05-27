<div style="margin-left: 250px; height: 550px; margin-top: 50px; " class="ui modal create coupled " id="create">
    <i class="close icon"></i>
    <div class="header">
      Nuevo Vehiculo
    </div>
    <div class="image content" >
      <div class="ui medium image" >
        <img class="ui medium circular image" src="{{asset('img\vehicle.jpg')}}">
      </div>
      <div class="description scrolling content " style="width: 500px;">
        <div style="padding-top: 35px;" >
            <form action="{{route('create-vehicle',$taxiDriver->id)}}" method="post" class="ui form">
                @csrf
                <div class="field">
                  <label >Modelo</label>
                  <select class="ui search dropdown" name="model" required>
                    <option value="">Seleccione un modelo</option>
                    @foreach ($models as $model)
                        <option value="{{$model->id}}" {{ old('model',$model->id) }} >{{$model->name}}</option>
                    @endforeach                        
                  </select>
              </div>
                <div class="field">
                    <label >Color</label>
                    {{-- <input type="text" name="color" placeholder="Color"
                    value="{{old('color')}}"> --}}
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
                    <label >Placa</label>
                    <input type="text" name="licensePlate" placeholder="Placa"
                    value="{{old('licensePlate')}}">
                </div>
                <div>
                    <button class="ui teal button">Guardar</button>
                </div>
            </form>
        </div>
      </div>
    </div>

    <div class="actions">
      <table>
        <tr>
          <td>
            <div class="ui black deny button">
              Cerrar
            </div>
          </td>
        </tr>
      </table>
      
    </div>

  </div>