@extends('layouts.app')

@section('title', 'Gestión de Alumnos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Alumnos</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Nuevo alumno</a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="{{ route('students.index') }}" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label for="dni" class="form-label">Buscar por DNI</label>
                <input id="dni" name="dni" class="form-control" value="{{ $dni }}" placeholder="Ingrese DNI">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="POST" action="{{ route('students.import') }}" enctype="multipart/form-data" class="row g-2 align-items-end">
            @csrf
            <div class="col-md-6">
                <label class="form-label" for="students_file">Importar CSV/XLSX</label>
                <input class="form-control" type="file" name="students_file" id="students_file" required>
            </div>
            <div class="col-md-4">
                <button class="btn btn-success" type="submit">Importar</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Programa</th>
                <th>Nivel</th>
                <th style="width: 150px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->dni }}</td>
                    <td>{{ $student->nombres }}</td>
                    <td>{{ $student->apellidos }}</td>
                    <td>{{ $student->correo }}</td>
                    <td>{{ $student->telefono }}</td>
                    <td>{{ $student->programa }}</td>
                    <td>{{ $student->nivel }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                        <form method="POST" action="{{ route('students.destroy', $student) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar alumno?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No se encontraron alumnos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $students->links() }}
@endsection
