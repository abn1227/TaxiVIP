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
            'distance'=>'required',
            'price'=>'required',
            'url'=>'required',
            'taxiDriver'=>'required',
            'phone'=>'required'
        ];
    }

}
