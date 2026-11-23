@extends('layouts.app')

@section('content')
<h2 class="mb-3">Registrar Profesor</h2>

<form action="{{ route('profesores.store') }}" method="POST" class="col-md-6">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Cédula</label>
        <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}" required>
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection