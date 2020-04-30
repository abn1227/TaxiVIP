<div style="margin-left: 250px; height: 600px; margin-top: 50px; " class="ui modal create coupled " id="create">
    <i class="close icon"></i>
    <div class="header">
      Nuevo Vehiculo
    </div>
    <div class="image content" >
      <div class="ui medium image" >
        <img style="margin-top: 50px" class="ui medium circular image" src="{{asset('img\vehicle.jpg')}}">
      </div>
      <div class="description scrolling content " style="width: 500px;">
        <div >
            <form action="{{route('create-vehicle',$taxiDriver->id)}}" method="post" class="ui form">
                @csrf
                <div class="field">
                    <label>Marca</label>
                    <input type="text" name="carBrand" placeholder="Marca"
                    value="{{old('cardBrand')}}">
                  </div>
                <div class="field">
                    <label >Modelo</label>
                    <input type="text" name="model" placeholder="Modelo"
                    value="{{old('model')}}">
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
                <div class="field">
                    <label >Estado</label>
                    <input type="text" placeholder="Estatus" name="status"
                    value="{{old('status')}}">
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