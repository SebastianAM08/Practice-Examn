@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Estudiantes</h2>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">Nuevo Estudiante</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Expediente</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Módulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
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
                    <td>{{ $student['module']['nombre'] ?? 'Sin módulo' }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('estudiantes.show', $student['id']) }}" class="btn btn-secondary btn-sm">Ver</a>
                        <a href="{{ route('estudiantes.edit', $student['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $student['id']) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar estudiante?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-secondary">No hay estudiantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection