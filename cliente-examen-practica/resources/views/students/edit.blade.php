@extends('layouts.app')

@section('content')
<h2 class="mb-3">Editar Estudiante #{{ $student['id'] }}</h2>

<form action="{{ route('estudiantes.update', $student['id']) }}" method="POST" enctype="multipart/form-data" class="col-md-6">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Expediente</label>
        <input type="text" name="expediente" class="form-control" value="{{ old('expediente', $student['expediente']) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $student['nombre']) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $student['apellidos']) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control"
               value="{{ old('fecha_nacimiento', substr($student['fecha_nacimiento'] ?? '', 0, 10)) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Módulo</label>
        <select name="module_id" class="form-select" required>
            <option value="">-- Selecciona un módulo --</option>
            @foreach($modules as $module)
                <option value="{{ $module['id'] }}" {{ old('module_id', $student['module_id']) == $module['id'] ? 'selected' : '' }}>
                    {{ $module['codigo'] }} - {{ $module['nombre'] }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Foto (deja vacío para conservar la actual)</label>
        @if(!empty($student['foto_url']))
            <div class="mb-2">
                <img src="{{ $student['foto_url'] }}" alt="Foto actual" width="80" height="80" class="rounded object-fit-cover">
            </div>
        @endif
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection