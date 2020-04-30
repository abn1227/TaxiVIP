<div style="margin-left: 250px; height: 480px; margin-top: 50px; " class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      Vehiculo
    </div>
    <div class="image content">
      <div class="ui medium image" >
        <img src="{{asset('img\vehicle.jpg')}}">
      </div>
      <div class="description scrolling content " style="width: 500px; height: 300px">
        <div >
            <form action="" class="ui form">
                @method('Put')
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
      <div class="ui black deny button">
        Cerrar
      </div>
    </div>

  </div>