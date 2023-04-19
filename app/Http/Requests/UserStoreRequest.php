<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'estado'=> 'required|in:A,D' 
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo NOMBRE es obligatorio',
            'username.required' => 'El campo NOMBRE DE USUARIO es obligatorio',
            'username.unique' => 'El nombre de usuario ya esta en uso',
            'password.required' => 'El campo CONTRASEÑA es obligatorio',
            'estado.required' => 'Debe seleccionar un ESTADO para la cuenta',
            'password.min' => 'El campo CONTRASEÑA debe tener minimo 8 caracteres',
        ];
    }

}
