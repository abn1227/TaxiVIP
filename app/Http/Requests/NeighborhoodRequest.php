<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NeighborhoodRequest extends FormRequest
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
            'neighborhood'=>'required',
            'firstTime'=>'required',
            'lastTime'=>'required',
            'selectRoute'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'neighborhood.required'=>'Debe ingresar el nombre de la colonia',
            'firstTime.required'=>'Debe ingresar la hora de inicio ',
            'lastTime.required'=>'Debe ingresar la hora de finalizacion',
            'selectRoute.required'=>'Debe seleccionar la ruta a la que sera asignada la colonia'
        ];
    }
}
