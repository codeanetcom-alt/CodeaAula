<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $studentId = $this->route('student')?->id;

        return [
            'dni' => [
                'required',
                'string',
                'max:20',
                'regex:/^[0-9A-Za-z-]+$/',
                Rule::unique('students', 'dni')->ignore($studentId),
            ],
            'nombres' => ['required', 'string', 'max:120'],
            'apellidos' => ['required', 'string', 'max:120'],
            'correo' => ['nullable', 'email:rfc,dns', 'max:150'],
            'telefono' => ['nullable', 'string', 'max:30'],
            'programa' => ['required', 'string', 'max:120'],
            'nivel' => ['required', 'string', 'max:50'],
        ];
    }
}
