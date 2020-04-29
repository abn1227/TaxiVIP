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
        return [
            'inputNewidentification'=>'required|max:13|unique:persons,identification',
            'inputNewName'=>'required',
            'inputNewMobile'=>'required',
            'inputNewEmail'=>'required|unique:users,email',
            'inputNewPassword'=>'required',
            'role'=>'required'
        ];
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
            'inputNewPassword.required'=>'RTN ya existe para otra empresa',
            'role.required'=>'Debe seleccionar un rol'
        ];
    }
}
