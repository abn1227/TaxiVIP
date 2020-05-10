<div style="margin-left: 250px; height: 600px; margin-top: 50px; " class="ui modal detail coupled" id="detail">
    <i class="close icon"></i>
    <div class="header">
      Vehiculo En uso
    </div>
    <div class="image content" >
      <div class="ui medium image" >
        <img style="margin-top: 50px" class="ui medium circular image" src="{{asset('img\vehicle.jpg')}}">
      </div>
      <div class="description scrolling content " style="width: 500px;">
        <div >
            <form action="{{route('update-vehicle',$vehicleActivate->id)}}" method="post" class="ui form">
                @method('Put')
                @csrf
             
                <div class="field">
                    <label >Modelo</label>
                    <select class="ui search dropdown" name="model">
                      @foreach ($models as $model)
                          <option value="{{$model->id}}" {{ old('model',$model->id) == "$vehicleActivate->car_models_id" ? "selected" : "" }} >{{$model->name}}</option>
                      @endforeach                        
                    </select>
                </div>
                <div class="field">
                    <label >Color</label>
                    <input type="text" name="color" placeholder="Color"
                    value="{{old('color',$vehicleActivate->color)}}">
                </div>
                <div class="field">
                    <label >Placa</label>
                    <input type="text" name="licensePlate" placeholder="Placa"
                    value="{{old('licensePlate',$vehicleActivate->license_plate)}}">
                </div>
                <div class="field">
                    <label >Estado</label>
                    <input type="text" placeholder="Estatus" name="status"
                    value="{{old('status',$vehicleActivate->active)}}">
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