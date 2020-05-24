<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    // protected $redirect = 'order';
    protected $redirectRoute = 'order';
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
        return [
            'distance'=>'required|numeric',
            'price'=>'required',
            'url'=>'required',
            'taxiDriver'=>'required',
            'phone'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'distance.numeric'=>'Debe ingresar un numero',
            'distance.required'=>'Debe ingresar la distancia',
            'price.required'=>'No se calculo el precio',
            'url.required'=>'Debe de ingresar la url de google maps',
            'taxiDriver.required'=>'debe seleccionar un taxista',
            'phone.required'=>'ingrese el número de celular del cliente'
        ];
    }
}
