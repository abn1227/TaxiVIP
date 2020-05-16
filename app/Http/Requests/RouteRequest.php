<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
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
                        'route'=>'required',
                    ];
                }
                break;
            case 'PUT':
                # code...
                break;
            default:
                # code...
                break;
        }
       
    }
    public function messages()
    {
        return[
            'route.required'=>'Debe ingresar el nombre de la ruta',
        ];
    }
}
