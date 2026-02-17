@extends('layouts.app')

@section('title', 'Registrar alumno')

@section('content')
<h1 class="h3 mb-3">Registrar alumno</h1>

<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="{{ route('students.create') }}" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label" for="lookup_dni">Consultar RENIEC (mock)</label>
                <input class="form-control" id="lookup_dni" name="lookup_dni" value="{{ $lookupDni }}" placeholder="12345678">
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-secondary" type="submit">Autocompletar</button>
            </div>
        </form>
    </div>
</div>

<form method="POST" action="{{ route('students.store') }}" class="card card-body">
    @csrf
    @include('students._form')

    <div class="mt-3">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a class="btn btn-outline-secondary" href="{{ route('students.index') }}">Cancelar</a>
    </div>
</form>
@endsection
