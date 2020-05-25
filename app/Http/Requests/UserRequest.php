<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'inputNewidentification'=>'required|max:13|unique:persons,identification',
                    'inputNewName'=>'required',
                    'inputNewMobile'=>'required',
                    'inputNewEmail'=>'required|unique:users,email',
                    'inputNewPassword'=>'required',
                    'role'=>'required'
                ];
               }
                break;
            case 'PUT':
                {
                    return [
                        'inputIdentification'=>'required|max:13|unique:persons,identification,'.$this->id,
                        'inputName'=>'required',
                        'inputMobile'=>'required',
                        'inputEmail'=>'required|unique:users,email,'.$this->id,
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
        return [
            'inputNewidentification.required'=>'Campo identificacion es necesario',
            'inputNewidentification.unique'=>'Ya existe una persona registrada con este id',
            'inputNewName.required'=>'Campo nombre es obligatorio',
            'inputNewMobile.required'=>'Es obligario que ingrese un numero de telefono',
            'inputNewEmail.required'=>'Campo obligatorio',
            'inputNewEmail.unique'=>'ya existe un usuario con este correo',
            'inputNewPassword.required'=>'Debe ingresar contraseña',
            'role.required'=>'Debe seleccionar un rol',
            'inputEmail.required'=>'Debe ingresar su email',
            'inputEmail.unique'=>'ya existe un usuario con este correo',
            'inputMobile.required'=>'Debe ingresar su número telefónico',
            'inputName.required'=>'Debe ingresar su número nombre',
            

        ];
    }
}
