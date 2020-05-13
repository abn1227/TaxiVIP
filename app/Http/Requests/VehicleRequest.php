<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App;

class VehicleRequest extends FormRequest
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
            
                        'model'=>'required',
                        'color'=>'required',
                        'licensePlate'=>'required|unique:vehicles,license_plate'
                    ];

                }
                break;
            case 'PUT':
                {
                    return [
                       
                        'model'=>'required',
                        'color'=>'required',
                        'licensePlate'=>'required|unique:vehicles,license_plate,'.$this->id
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
            'model.required'=>'Debe seleccionar un modelo',
            'color.required'=>'Debe ingresar el color del vehiculo',
            'licensePlate.required'=>'Debe ingresar la placa del vehiculo',
            'licensePlate.unique'=>'Este vehiculo ya se encuentra registrado',
                        
        ];
    }
}
