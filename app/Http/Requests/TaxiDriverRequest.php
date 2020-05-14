<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App;

class TaxiDriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                {
                    return [
                        //
                        'inputPercentaje'=>'required',
                        'inputCurrentDriverLicense'=>'required',
                        'cut'=>'required',
                        'model'=>'required',
                        'color'=>'required',
                        'licensePlate'=>'required|unique:vehicles,license_plate',
                        'route'=>'required',
                        
                    ];
                }
              
                break;
            case 'PUT':
                {
                    $taxiDriver=App\Taxi_Driver::findOrFail($this->id);
                    
                    return [
                        //
                        'inputTaxiDriverIdentification'=>'required|unique:persons,identification,'.$taxiDriver->persons_id,
                        'inputTaxiDriverName'=>'required',
                        'inputTaxiDriverMobile'=>'required',
                        'inputTaxiDriverPercentage'=>'required',
                        'cut'=>'required',
                        'inputTaxiDriverDate'=>'required',
                        'selectVehicle'=>'required',
                        'route'=>'required',
                    ];
                   }
                break;
            default:
                # code...
                break;
        }
       
    }
    public function messages()
    {
        return[
            'inputTaxiDriverIdentification.required'=>'Debe ingresar la identidad',
            'inputTaxiDriverIdentification.required'=>'Existe otro empleado con ese id',
            'inputTaxiDriverName.required'=>'Debe ingresar el nombre del conductor',
            'inputTaxiDriverMobile.required'=>'Ingrese el numero de telefono',
            'inputTaxiDriverPercentage.required'=>'Debe ingresar el porcentaje',
            'cut.required'=>'Debe seleccionar una fecha de corte',
            'inputPercentaje.required'=>'Debe ingresar el porcentaje',
            'inputCurrentDriverLicense.required'=>'Debe ingresar la fecha de vencimiento de la licencia',
            'model.required'=>'Debe seleccionar un modelo de vehiculo',
            'color.required'=>'Debe ingresar el color del vehiculo',
            'licensePlate.required'=>'Debe ingresar la placa del vehiculo',
            'licensePlate.unique'=>'Este vehiculo ya se encuentra registrado',
            'inputTaxiDriverDate.required'=>'Debe imgresar una fecha de vencimiento para la licencia',
            'selectVehicle.required'=>'Debe seleccionar un vehiculo',
            'route.required'=>'Debe seleccionar la ruta a la que sera asignado el taxista'
        ];
    }
}
