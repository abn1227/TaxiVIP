<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            //
            'inputTaxiDriverIdentification'=>'required|max:13','unique:persons,identification,$taxiDriver->person->identification',
            'inputTaxiDriverName'=>'required',
            'inputTaxiDriverMobile'=>'required',
            'inputTaxiDriverPercentage'=>'required',
            'inputTaxiDriverEmail'=>'required','unique:users,email,$user->email',
            'cut'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'inputTaxiDriverIdentification.required'=>'Campo identificacion es necesario',
            'inputTaxiDriverIdentification.unique'=>'Ya existe una persona registrada con este id',
            'inputTaxiDriverName.required'=>'Campo nombre es obligatorio',
            'inputTaxiDriverMobile.required'=>'Es obligario que ingrese un numero de telefono',
            'inputTaxiDriverPercentage.required'=>'Campo obligatorio',
            'inputTaxiDriverPercentage.required'=>'email es un campo obligatorio',
            'inputTaxiDriverEmail.unique'=>'ya existe un usuario con este correo',
            'inputTaxiDriverEmail.required'=>'Email es un campo requerido',
            'cut'=>'Debe seleccionar una fecha de corte'
        ];
    }
}
