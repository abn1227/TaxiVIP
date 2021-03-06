<div style="margin-left: 250px; height: 550px; margin-top: 50px; " class="ui modal detail coupled" id="detail">
    <i class="close icon"></i>
    <div class="header">
      Vehiculo En uso
    </div>
    <div class="image content" >
      <div class="ui medium image" >
        <img  class="ui medium circular image" src="{{asset('img\vehicle.jpg')}}">
      </div>
      <div class="description scrolling content " style="width: 500px;">
        <div style="padding-top: 35px" >
            <form action="{{route('update-vehicle',$vehicleActivate->id)}}" method="post" class="ui form">
                @method('Put')
                @csrf
             
                <div class="field">
                    <label >Modelo</label>
                    <select class="ui search dropdown" name="model" required>
                      @foreach ($models as $model)
                          <option value="{{$model->id}}" {{ old('model',$model->id) == "$vehicleActivate->car_models_id" ? "selected" : "" }} >{{$model->name}}</option>
                      @endforeach                        
                    </select>
                </div>
                <div class="field">
                    {{-- <label >Color</label>
                    <input type="text" name="color" placeholder="Color"
                    value="{{old('color',$vehicleActivate->color)}}" required> --}}
                    <select name="color" id="color" required>
                      <option value="">Seleccione un color</option>
                      <option value="Negro"{{ old('color',$vehicleActivate->color) == "Negro" ? "selected" : "" }}>Negro</option>
                      <option value="Rojo" {{ old('color',$vehicleActivate->color) == "Rojo" ? "selected" : "" }}>Rojo</option>
                      <option value="Azul" {{ old('color',$vehicleActivate->color) == "Azul" ? "selected" : "" }}>Azul</option>
                      <option value="Blanco" {{ old('color',$vehicleActivate->color) == "Blanco" ? "selected" : "" }}>Blanco</option>
                      <option value="Amarillo" {{ old('color',$vehicleActivate->color) == "Amarillo" ? "selected" : "" }}>Amarillo</option>
                      <option value="Verde" {{ old('color',$vehicleActivate->color) == "Verde" ? "selected" : "" }}>Verde</option>
                      <option value="Gris" {{ old('color',$vehicleActivate->color) == "Gris" ? "selected" : "" }}>Gris</option>
                      <option value="Marrón" {{ old('color',$vehicleActivate->color) == "Marrón" ? "selected" : "" }}>Marrón</option>
                      <option value="Plateado" {{ old('color',$vehicleActivate->color) == "Plateado" ? "selected" : "" }}>Plateado</option>
                      <option value="Morado" {{ old('color',$vehicleActivate->color) == "Morado" ? "selected" : "" }}>Morado</option>
                      <option value="Oliva" {{ old('color',$vehicleActivate->color) == "Oliva" ? "selected" : "" }}>Oliva</option>
                    </select>
                </div>
                <div class="field">
                  <label>Año</label>
                  <select name="year" id="year" class="ui search dropdown" >
                    <option value="">Año del vehículo</option>
                  @for ($i = 2006; $i < 2017; $i++)
                      <option value="{{$i}}"
                      {{old('year',$vehicleActivate->car_year) == "$i" ? "selected" : ""}}> {{$i}}</option>
                  @endfor
                </select>
                </div>
                <div class="field">
                    <label >Placa</label>
                    <input type="text" name="licensePlate" placeholder="Placa"
                    value="{{old('licensePlate',$vehicleActivate->license_plate)}}" required>
                </div>
                <div>
                    <button class="ui teal button">Actualizar</button>
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
          <td>
          
              <button class="ui green button"  data-modal="create" id="callCreate">
                <i class="plus icon"></i> Agregar
              </button>
          
          </td>
        </tr>
      </table>
      
    </div>

  </div>