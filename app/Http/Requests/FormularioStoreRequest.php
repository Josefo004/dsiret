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
            "department_id" => "exists:departments,id",
            "genero_id" => "exists:genders,id",
            "nombres" => "required|string",
            "paterno" => "",
            "materno" => "",
            "fecha_nac" => "required|date",
            "nro_celular" => "nullable",
            "direccion" => "string",
            "email" => "nullable|email",
            "profesion_id" => "exists:professions,id",
            "language_id" => "required",
            "profession_id" => "required",
        ];
    }

    public function messages(){
        return [
            "nro_documento.required" => "El campo CI es obligatorio",
            "nro_documento.unique" => "El campo CI ya esta registrado en la Base de Datos",
            "department_id .required" => "El campo expedido es obligatorio",
            "department_id .exists" => "El valor del campo expedido no esta en la Base de Datos",
            "genero_id.required" => "El campo sexo es obligatorio",
            "nombres.required" => "El campo nombres es obligatorio",
            "fecha_nac:required" => "La fecha de nacimiento es obligatoria",
            "fecha_nac:date" => "El formato de fecha es erroneo",
            "profesion_id.exists" => "La profesion no esta en la Base de Datos",
            "language_id.required" => "Debe al menos registrar un idioma",
            "profession_id.required" => "Debe al menos registrar una ocupación"
        ];
    }

}
