@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Detalle del Módulo</h2>
    <a href="{{ route('modulos.index') }}" class="btn btn-secondary">Volver</a>
</div>

<div class="card p-3 mb-4">
    <p class="mb-1"><strong>ID:</strong> {{ $module['id'] }}</p>
    <p class="mb-1"><strong>Código:</strong> {{ $module['codigo'] }}</p>
    <p class="mb-0"><strong>Nombre:</strong> {{ $module['nombre'] }}</p>
</div>

<h4>Profesores asignados</h4>
@if(!empty($module['teachers']))
    <ul class="list-group mb-4">
        @foreach($module['teachers'] as $teacher)
            <li class="list-group-item">
                {{ $teacher['nombre'] }} {{ $teacher['apellido'] }} — Cédula: {{ $teacher['cedula'] }}
            </li>
        @endforeach
    </ul>
@else
    <p class="text-secondary mb-4">Sin profesores asignados.</p>
@endif

<h4>Estudiantes matriculados</h4>
@if(!empty($module['students']))
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Expediente</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($module['students'] as $student)
                    <tr>
                        <td>
                            @if(!empty($student['foto_url']))
                                <img src="{{ $student['foto_url'] }}" alt="Foto" width="40" height="40"
                                     class="rounded object-fit-cover">
                            @else
                                <span class="text-secondary">-</span>
                            @endif
                        </td>
                        <td>{{ $student['expediente'] }}</td>
                        <td>{{ $student['nombre'] }}</td>
                        <td>{{ $student['apellidos'] }}</td>
                        <td>{{ $student['fecha_nacimiento'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="text-secondary">No hay estudiantes inscritos en este módulo.</p>
@endif
@endsection