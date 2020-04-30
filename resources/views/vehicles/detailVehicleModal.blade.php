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
            <form action="{{route('update-vehicle',$vehicle->id)}}" method="post" class="ui form">
                @method('Put')
                @csrf
                
                <div class="field">
                    <label>Marca</label>
                    <input type="text" name="carBrand" placeholder="Marca"
                    value="{{old('cardBrand',$vehicle->car_brand)}}">
                  </div>
                <div class="field">
                    <label >Modelo</label>
                    <input type="text" name="model" placeholder="Modelo"
                    value="{{old('model',$vehicle->model)}}">
                </div>
                <div class="field">
                    <label >Color</label>
                    <input type="text" name="color" placeholder="Color"
                    value="{{old('color',$vehicle->color)}}">
                </div>
                <div class="field">
                    <label >Placa</label>
                    <input type="text" name="licensePlate" placeholder="Placa"
                    value="{{old('licensePlate',$vehicle->license_plate)}}">
                </div>
                <div class="field">
                    <label >Estado</label>
                    <input type="text" placeholder="Estatus" name="status"
                    value="{{old('status',$vehicle->active)}}">
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
            <form action="{{route('delete-vehicle',$vehicle->id)}}" method="post">
              @method('delete')
              @csrf
              <button style="margin-top: 15px" class="ui red button" >
                <i class="trash icon"></i> Eliminar
              </button>
            </form>
            
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