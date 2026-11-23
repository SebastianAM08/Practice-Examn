@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Detalle del Estudiante</h2>
    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver</a>
</div>

<div class="card p-3 col-md-6">
    @if(!empty($student['foto_url']))
        <div class="mb-3">
            <img src="{{ $student['foto_url'] }}" alt="Foto" width="120" height="120" class="rounded object-fit-cover">
        </div>
    @endif
    <p class="mb-1"><strong>ID:</strong> {{ $student['id'] }}</p>
    <p class="mb-1"><strong>Expediente:</strong> {{ $student['expediente'] }}</p>
    <p class="mb-1"><strong>Nombre:</strong> {{ $student['nombre'] }} {{ $student['apellidos'] }}</p>
    <p class="mb-1"><strong>Fecha de nacimiento:</strong> {{ substr($student['fecha_nacimiento'] ?? '', 0, 10) }}</p>
    <p class="mb-0"><strong>Módulo:</strong>
        @if(!empty($student['module']))
            {{ $student['module']['codigo'] }} - {{ $student['module']['nombre'] }}
        @else
            Sin módulo
        @endif
    </p>
</div>
@endsection