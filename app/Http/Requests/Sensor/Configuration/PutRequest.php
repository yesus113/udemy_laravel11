<?php

namespace App\Http\Requests\Sensor\Configuration;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'con_equipo' => 'required|min:5|max:500',
            'con_latitud' => 'required|min:7',
            'con_longitud' => 'required|min:7',
            'con_user'  => 'required|min:8',
        ];
    }
}
