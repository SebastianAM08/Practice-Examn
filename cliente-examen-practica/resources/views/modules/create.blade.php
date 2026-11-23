@extends('layouts.app')

@section('content')
<h2 class="mb-3">Registrar Módulo</h2>

<form action="{{ route('modulos.store') }}" method="POST" class="col-md-6">
    @csrf
    <div class="mb-3">
        <label class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
    </div>
    <div class="mb-3">
    <label class="form-label">Profesor</label>
    <select name="teacher_id" class="form-select">
        <option value="">-- Selecciona un profesor --</option>
        @foreach($teachers as $teacher)
            <option value="{{ $teacher['id'] }}" {{ old('teacher_id') == $teacher['id'] ? 'selected' : '' }}>
                {{ $teacher['nombre'] }} {{ $teacher['apellido'] }}
            </option>
        @endforeach
    </select>
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('modulos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection