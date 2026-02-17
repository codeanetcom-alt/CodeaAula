<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::query()->updateOrCreate(
            ['dni' => '12345678'],
            [
                'nombres' => 'Ana María',
                'apellidos' => 'Pérez Rojas',
                'correo' => 'ana.perez@example.com',
                'telefono' => '999888777',
                'programa' => 'Ingeniería de Sistemas',
                'nivel' => '3',
            ]
        );

        Student::query()->updateOrCreate(
            ['dni' => '87654321'],
            [
                'nombres' => 'Luis Alberto',
                'apellidos' => 'Quispe Flores',
                'correo' => 'luis.quispe@example.com',
                'telefono' => '988777666',
                'programa' => 'Administración',
                'nivel' => '1',
            ]
        );
    }
}
