@extends('templates/mainTemplate')

@section('title')
    Agregar Vehiculo
@endsection

@section('body')
        @extends('templates/navBarAdmin')
        

        <div class="container" >
            <div class="row">
              <div class="col-lg-6" align="center" >
              <img src="{{ asset('img/carrera.jpg') }}" alt="" style="width: 500px; height: 500px; ">
              </div>
              <div class="col-lg-6" style="padding-top:60px; padding-right:120px;">

              <form method="POST" action="{{route('new.vehicle', $vehicle->id)}}"> 
                @method('PUT')
                @csrf
                
              
              
                  <div class="form-group">
                    <label for="exampleInputEmail1">Codigo del Vehiculo</label>
                    <input type="text" class="form-control" 
                            name="id" 
                            aria-describedby="emailHelp"
                            value="{{$vehicle->id}}">

                            @error('id')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    El codigo es requerido
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Marca</label>
                    <input type="text" class="form-control" 
                            name="cardBrand" 
                            aria-describedby="emailHelp"
                            value="{{$vehicle->cardBrand}}">

                             @error('cardBrand')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    La marca es requerida
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Modelo</label>
                    <input type="text" class="form-control" 
                            name="model" 
                            aria-describedby="emailHelp"
                            value="{{$vehicle->model}}">

                            @error('model')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    El modelo es requerido
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Numero de Placa</label>
                    <input type="text" class="form-control" 
                            name="licensePlate" 
                            aria-describedby="emailHelp"
                            value="{{$vehicle->licensePlate}}">

                            @error('licensePlate')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    El numero de placa es requerido
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            @enderror


                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Disponibilidad</label>
                    <input type="text" class="form-control" 
                            name="active" 
                            aria-describedby="emailHelp"
                            value="{{$vehicle->active}}">

                            @error('active')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    El estado es requerido
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Codigo del Conductor</label>
                    <input type="text" class="form-control" 
                            name="taxyDrivers_id" 
                            aria-describedby="emailHelp"
                            value="{{$vehicle->taxyDrivers_id}}">

                            @error('taxyDrivers_id')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    El codigo del conductor requerido
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            @enderror
                  </div>
                
                 
                  
                  <div style="margin-left: 50px">
                     <button type="submit" class="large ui blue button">Actualizar</button>

                     
                  </div> 


                  
              </form>

              <div style="margin-left: 50px">
            <a href="{{route('carros')}}"><button class="large ui blue basic button">Atras</button></a>
                     
          </div>

          @if(session('exito'))

    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: 50px">

      {{ session('exito')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left: 50px">
        <span aria-hidden="true">&times;</span>
        </button>

    </div>



    @endif
            
              </div>
            </div>
            
          </div>
@endsection