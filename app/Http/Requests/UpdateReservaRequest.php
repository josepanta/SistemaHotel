<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservaRequest extends FormRequest
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
            "usuario_id" => "required",
            "estado" => "required",
            "tipo" => "required",
            "tabla_array" => "required|json"
        ];
    }

    public function attributes()
    {
        return [
            "usuario_id" => "usuario",
            "tipo_habitacion_id" => "tipo"
        ];
    }
}
