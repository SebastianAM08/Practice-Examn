@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Detalle del Profesor</h2>
    <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Volver</a>
</div>

<div class="card p-3 mb-4">
    <p class="mb-1"><strong>ID:</strong> {{ $teacher['id'] }}</p>
    <p class="mb-1"><strong>Nombre:</strong> {{ $teacher['nombre'] }} {{ $teacher['apellido'] }}</p>
    <p class="mb-1"><strong>Teléfono:</strong> {{ $teacher['telefono'] }}</p>
    <p class="mb-0"><strong>Cédula:</strong> {{ $teacher['cedula'] }}</p>
</div>

<h4>Módulos asignados</h4>
@if(!empty($teacher['modules']))
    <ul class="list-group">
        @foreach($teacher['modules'] as $module)
            <li class="list-group-item">{{ $module['codigo'] }} - {{ $module['nombre'] }}</li>
        @endforeach
    </ul>
@else
    <p class="text-secondary">Sin módulos asignados.</p>
@endif
@endsection