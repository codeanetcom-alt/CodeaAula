<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicCatalogSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('academic_years')->insert([
            'name' => '2026-I',
            'start_date' => '2026-01-10',
            'end_date' => '2026-06-30',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $careerId = DB::table('careers')->insertGetId([
            'name' => 'Ingeniería de Software',
            'code' => 'ISW',
            'description' => 'Programa base demo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            [
                'career_id' => $careerId,
                'name' => 'Programación I',
                'code' => 'ISW-101',
                'credits' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'career_id' => $careerId,
                'name' => 'Base de Datos',
                'code' => 'ISW-201',
                'credits' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
