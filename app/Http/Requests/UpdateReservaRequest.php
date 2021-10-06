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
            "user_id" => "required",
            "estado" => "required",
            "tipo_reserva_id" => "required",
            "tabla_array" => "required|json"
        ];
    }

    public function attributes()
    {
        return [
            "user_id" => "usuario",
            "tipo_reserva_id" => "tipo"
        ];
    }
}
