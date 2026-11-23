@extends('layouts.app')

@section('content')
    <h1>Sistema de Gestión Educativa</h1>
    <p>Selecciona un módulo para comenzar:</p>
    <div class="d-flex gap-2">
        <a href="{{ url('/profesores') }}" class="btn btn-primary">Profesores</a>
        <a href="{{ url('/modulos') }}" class="btn btn-primary">Módulos</a>
        <a href="{{ url('/estudiantes') }}" class="btn btn-primary">Estudiantes</a>
    </div>
@endsection