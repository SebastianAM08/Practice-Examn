@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Profesores</h2>
    <a href="{{ route('profesores.create') }}" class="btn btn-primary">Nuevo Profesor</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Cédula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr>
                    <td>{{ $teacher['id'] }}</td>
                    <td>{{ $teacher['nombre'] }}</td>
                    <td>{{ $teacher['apellido'] }}</td>
                    <td>{{ $teacher['telefono'] }}</td>
                    <td>{{ $teacher['cedula'] }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('profesores.show', $teacher['id']) }}" class="btn btn-secondary btn-sm">Ver</a>
                        <a href="{{ route('profesores.edit', $teacher['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('profesores.destroy', $teacher['id']) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar profesor?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-secondary">No hay profesores registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection