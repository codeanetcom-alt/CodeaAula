<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table): void {
            $table->id();
            $table->string('dni', 20)->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('programa');
            $table->string('nivel', 50);
            $table->timestamps();

            $table->index('dni');
        });

        Schema::create('academic_histories', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('period', 20)->nullable();
            $table->string('course_code', 20)->nullable();
            $table->string('course_name')->nullable();
            $table->decimal('grade', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_histories');
        Schema::dropIfExists('students');
    }
};
