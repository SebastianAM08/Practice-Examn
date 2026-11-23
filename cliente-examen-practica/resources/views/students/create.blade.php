@extends('layouts.app')

@section('content')
<h2 class="mb-3">Registrar Estudiante</h2>

<form action="{{ route('estudiantes.store') }}" method="POST" enctype="multipart/form-data" class="col-md-6">
    @csrf
    <div class="mb-3">
        <label class="form-label">Expediente</label>
        <input type="text" name="expediente" class="form-control" value="{{ old('expediente') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Módulo</label>
        <select name="module_id" class="form-select" required>
            <option value="">-- Selecciona un módulo --</option>
            @foreach($modules as $module)
                <option value="{{ $module['id'] }}" {{ old('module_id') == $module['id'] ? 'selected' : '' }}>
                    {{ $module['codigo'] }} - {{ $module['nombre'] }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png,.webp">
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection