<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dni' => ['required', 'string', 'max:20', 'regex:/^[0-9A-Za-z-]+$/', 'unique:students,dni'],
            'nombres' => ['required', 'string', 'max:120'],
            'apellidos' => ['required', 'string', 'max:120'],
            'correo' => ['nullable', 'email:rfc,dns', 'max:150'],
            'telefono' => ['nullable', 'string', 'max:30'],
            'programa' => ['required', 'string', 'max:120'],
            'nivel' => ['required', 'string', 'max:50'],
        ];
    }
}
