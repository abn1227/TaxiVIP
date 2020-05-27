<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarModelRequest extends FormRequest
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
                        'carModel' => 'required',
                        'searchCarBrand' => 'required'
                    ];
                }
                break;
            case 'PUT':
               {
                return [
                    'editCarModel' => 'required',
                    'editSearchCarBrand' => 'required'
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
            'carModel.required'=>'Debe ingresar el nombre del modelo',
            'searchCarBrand.required'=>'Debe seleccionar una marca',
            'editCarModel.required'=>'Debe ingresar el nombre del modelo',
            'editSearchCarBrand.required'=>'Debe seleccionar una marca',
        ];
    }
}
