@extends('layouts.app')

@section('content')
<h2 class="mb-3">Editar Profesor #{{ $teacher['id'] }}</h2>

<form action="{{ route('profesores.update', $teacher['id']) }}" method="POST" class="col-md-6">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $teacher['nombre']) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $teacher['apellido']) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $teacher['telefono']) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Cédula</label>
        <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $teacher['cedula']) }}" required>
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection