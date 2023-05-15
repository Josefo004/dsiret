<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormulariosEditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "department_id" => "required",
            "gender_id" => "required",
            "nombres" => "required|string",
            "paterno" => "",
            "materno" => "",
            "fecha_nac" => "required|date",
            "nro_celular" => "nullable",
            "direccion" => "string",
            "email" => "nullable|email",
            "record_id" => "required",
            "language_id" => "required",
            "profesion_id" => "required",
        ];
    }

    public function messages()
    {
        return [
            "department_id.required" => "El campo expedido es obligatorio",
            "department_id.exists" => "El valor del campo expedido no esta en la Base de Datos",
            "gender_id.required" => "El campo sexo es obligatorio",
            "nombres.required" => "El campo nombres es obligatorio",
            "fecha_nac:required" => "La fecha de nacimiento es obligatoria",
            "fecha_nac:date" => "El formato de fecha es erroneo",
            "record_id.required" => "Debe escoger un nivel académico",
            "language_id.required" => "Debe al menos registrar un idioma",
            "profession_id.required" => "Debe al menos registrar una ocupación"
        ];
    }
}
