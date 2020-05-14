<div style="margin-left: 250px; height: 500px; margin-top: 50px; " class="ui modal create coupled " id="create">
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
                  <select class="ui search dropdown" name="model">
                    <option value="">Seleccione un modelo</option>
                    @foreach ($models as $model)
                        <option value="{{$model->id}}" {{ old('model',$model->id) }} >{{$model->name}}</option>
                    @endforeach                        
                  </select>
              </div>
                <div class="field">
                    <label >Color</label>
                    <input type="text" name="color" placeholder="Color"
                    value="{{old('color')}}">
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