<?php
namespace App\Http\Requests\Sensor\Configuration;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'con_equipo' => 'required|string|min:5|max:500',
            'con_latitud' => 'required|numeric|between:-90,90',
            'con_longitud' => 'required|numeric|between:-180,180',
            'user_id' => 'required|exists:users,id',
        ];
    }
}