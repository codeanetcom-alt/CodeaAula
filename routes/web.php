<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/students');

Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
Route::resource('students', StudentController::class);
