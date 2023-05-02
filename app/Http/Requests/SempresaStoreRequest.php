<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SempresaStoreRequest extends FormRequest
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
            "municipio_id" => "exists:municipios,id",
            "eactividade_id" => "exists:eactividades,id",
            "regime_id" => "exists:regimes,id",
            "razon_social" => "required|string",
            "NIT" => "nullable",
            "nro_roe" => "nullable",
            "emp_direccion" => "required",
            "emp_telefono" => "required",
            "nro_documento" => "required|unique:persons",
            "department_id" => "required|exists:departments,id",
            "gender_id" => "required|exists:genders,id",
            "nro_celular" => "required",
            "nombres" => "required",
            "paterno" => "nullable",
            "materno" => "nullable",
        ];
    }

    public function messages(){
        return [
            "municipio_id.exists" => "Debe escoger un Municipio",
            "eactividade_id.exists" => "Debe escoger una Actividad Económica",
            "regime_id.exists" => "Debe escoger un Regimen Impositivo",
            "emp_direccion.required" => "La direccion de la empresa es obligatoria",
            "emp_telefono.required" => "El telefono de la empresa es obligatorio",
            "nro_documento.unique" => "El campo CI ya esta registrado en la Base de Datos",
            "nro_documento.required" => "El campo CI es obligatorio",
            "gender_id.exists" => "Debe escoger sexo",
            "department_id.exists" => "Debe escoger expedido",
            "nro_celular.required" => "El numero de telefono del responsable es Requerido",
            "nombres.required" => "El nombre del responsable es Requerido",
        ];
    }
}

