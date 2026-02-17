<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row): Student
    {
        return Student::updateOrCreate(
            ['dni' => (string) ($row['dni'] ?? '')],
            [
                'nombres' => (string) ($row['nombres'] ?? ''),
                'apellidos' => (string) ($row['apellidos'] ?? ''),
                'correo' => $row['correo'] ?? null,
                'telefono' => $row['telefono'] ?? null,
                'programa' => (string) ($row['programa'] ?? ''),
                'nivel' => (string) ($row['nivel'] ?? ''),
            ]
        );
    }

    public function rules(): array
    {
        return [
            '*.dni' => ['required', 'string', 'max:20', 'regex:/^[0-9A-Za-z-]+$/'],
            '*.nombres' => ['required', 'string', 'max:120'],
            '*.apellidos' => ['required', 'string', 'max:120'],
            '*.correo' => ['nullable', 'email:rfc,dns', 'max:150'],
            '*.telefono' => ['nullable', 'string', 'max:30'],
            '*.programa' => ['required', 'string', 'max:120'],
            '*.nivel' => ['required', 'string', 'max:50'],
        ];
    }
}
