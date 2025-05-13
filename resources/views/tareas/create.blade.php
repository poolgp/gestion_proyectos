@extends('layouts.main')

@section('title', 'Gestión de Tareas')

@section('content')
    {{-- <form action="{{ route('tarea.store') }}" method="POST"> --}}
    <form action="{{ action([App\Http\Controllers\TareaController::class, 'store']) }}" method="POST">
        @csrf
        <input type="hidden" name="proyecto_id" value="{{ $proyecto_id }}">

        <div class="mb-3">
            <label>Título de la tarea</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Proyecto</label>
            <input type="text" class="form-control" value="{{ $proyecto_nombre }}" readonly>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                @foreach ($estados as $estado)
                    <option value="{{ $estado->nombre_e }}">{{ $estado->nombre_e }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Prioridad</label>
            <select name="prioridad" class="form-control">
                @foreach ($prioridades as $prioridad)
                    <option value="{{ $prioridad->nombre_p }}">{{ $prioridad->nombre_p }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Asignar a</label>
            <select name="usuario_id" class="form-control">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->usuario_id }}">{{ $usuario->nombre_u }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
