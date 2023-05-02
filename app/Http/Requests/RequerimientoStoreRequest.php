<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequerimientoStoreRequest extends FormRequest
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
            "profession_id" => "exists:professions,id",
            "cantidad" => "required|numeric|min:1|not_in:0",
        ];
    }

    public function messages(){
        return [
            "profession_id.exists" => "Debe escoger una Profession",
        ];
    }
}

