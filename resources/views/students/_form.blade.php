<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label" for="dni">DNI</label>
        <input class="form-control" id="dni" name="dni" value="{{ old('dni', $student->dni ?? $lookupDni ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label" for="nombres">Nombres</label>
        <input class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $student->nombres ?? $prefill['nombres'] ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label" for="apellidos">Apellidos</label>
        <input class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos', $student->apellidos ?? $prefill['apellidos'] ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label" for="correo">Correo</label>
        <input class="form-control" id="correo" name="correo" type="email" value="{{ old('correo', $student->correo ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label" for="telefono">Teléfono</label>
        <input class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $student->telefono ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label" for="programa">Programa</label>
        <input class="form-control" id="programa" name="programa" value="{{ old('programa', $student->programa ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label" for="nivel">Nivel</label>
        <input class="form-control" id="nivel" name="nivel" value="{{ old('nivel', $student->nivel ?? '') }}" required>
    </div>
</div>
