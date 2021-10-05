<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHabitacionRequest extends FormRequest
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
            "letra_numero" => "required|string",
            "estado" => "required|string",
            "tipo_habitacion_id" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "letra_numero" => "letra-numero",
            "tipo_habitacion_id" => "tipo"
        ];
    }
}
