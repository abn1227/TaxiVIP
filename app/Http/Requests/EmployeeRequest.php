<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App;

class EmployeeRequest extends FormRequest
{
    //protected $redirectRoute = 'edit-employees';
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
        $user=App\User::findOrFail($this->id);
        return [
            'inputUserIdentification'=>'required|unique:persons,id,'.$user->persosn_id,
            'inputUserName'=>'required',
            'inputUserMobile'=>'required',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'inputUserIdentification.required'=>'Debe ingresar la identificacion',
            'inputUserIdentification.unique'=>'Existe otro usuario registrado con esta identidad',
            'inputUserName.required'=>'Debe ingresar el nombre',
            'inputUserMobile.required'=>'Debe ingresar el numero de telefono',
            'status.required'=>'Debe seleccionar un estado para el empleado',
        ];
    }
}
