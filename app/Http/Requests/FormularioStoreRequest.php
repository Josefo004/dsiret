<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioStoreRequest extends FormRequest
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
            "nro_documento" => "required|unique:persons",
            "departamento_id" => "exists:departments,id",
            "genero_id" => "exists:genders,id",
            "nombres" => "required|string",
            "paterno" => "",
            "materno" => "",
            "fecha_nac" => "required|date",
            "nro_celular" => "string",
            "direccion" => "string",
            "email" => "nullable|email",
            "profesion_id" => "exists:professions,id",
            "language_id" => "required",
            "profession_id" => "required",
        ];
    }


}
