@extends('layouts.app')

@section('title', 'Editar alumno')

@section('content')
<h1 class="h3 mb-3">Editar alumno</h1>

<form method="POST" action="{{ route('students.update', $student) }}" class="card card-body">
    @csrf
    @method('PUT')
    @include('students._form')

    <div class="mt-3">
        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a class="btn btn-outline-secondary" href="{{ route('students.index') }}">Cancelar</a>
    </div>
</form>
@endsection
