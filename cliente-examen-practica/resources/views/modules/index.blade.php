@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Módulos</h2>
    <a href="{{ route('modulos.create') }}" class="btn btn-primary">Nuevo Módulo</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Profesores</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($modules as $module)
                <tr>
                    <td>{{ $module['id'] }}</td>
                    <td>{{ $module['codigo'] }}</td>
                    <td>{{ $module['nombre'] }}</td>
                    <td>
                        @if(!empty($module['teachers']))
                            {{ collect($module['teachers'])->map(fn($t) => $t['nombre'] . ' ' . $t['apellido'])->implode(', ') }}
                        @else
                            <span class="text-secondary">Sin asignar</span>
                        @endif
                    </td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('modulos.show', $module['id']) }}" class="btn btn-secondary btn-sm">Ver</a>
                        <a href="{{ route('modulos.edit', $module['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('modulos.destroy', $module['id']) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar módulo?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-secondary">No hay módulos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection