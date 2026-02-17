<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Imports\StudentsImport;
use App\Models\Student;
use App\Services\Reniec\ReniecProviderInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function __construct(private readonly ReniecProviderInterface $reniecProvider)
    {
    }

    public function index(Request $request): View
    {
        $dni = trim((string) $request->query('dni', ''));

        $students = Student::query()
            ->when($dni !== '', function ($query) use ($dni): void {
                $query->where('dni', 'like', "%{$dni}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('students.index', compact('students', 'dni'));
    }

    public function create(Request $request): View
    {
        $prefill = null;
        $lookupDni = trim((string) $request->query('lookup_dni', ''));

        if ($lookupDni !== '') {
            $prefill = $this->reniecProvider->findByDni($lookupDni);
        }

        return view('students.create', compact('prefill', 'lookupDni'));
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        Student::create($request->validated());

        return redirect()->route('students.index')->with('status', 'Alumno creado correctamente.');
    }

    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());

        return redirect()->route('students.index')->with('status', 'Alumno actualizado correctamente.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('students.index')->with('status', 'Alumno eliminado correctamente.');
    }

    public function import(Request $request): RedirectResponse
    {
        $request->validate([
            'students_file' => ['required', 'file', 'mimes:csv,xlsx,xls'],
        ]);

        Excel::import(new StudentsImport(), $request->file('students_file'));

        return redirect()->route('students.index')->with('status', 'Importación completada correctamente.');
    }
}
