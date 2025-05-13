@extends('layouts.main')

@section('title', 'Mis Proyectos')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2><i class="fas fa-folder-open"></i> Mis Proyecto</h2>

            <div>
                <a href="{{ url('proyecto/create') }}" class="btn btn-success">Crear Proyecto</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Proyecto</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha fin</th>
                    <th scope="col">Tareas</th>
                    {{-- <th scope="col">Editar</th> --}}
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td class="align-middle">{{ $proyecto->proyecto_id }}</td>
                        <td class="align-middle">{{ $proyecto->nombre_p }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d/m/Y') }}</td>
                        {{-- <td class="align-middle">
                            <a href="{{ url('tarea.index') }}">
                                <i class="fa-solid fa-list-check"></i>
                            </a>
                        </td> --}}
                        {{-- <td class="align-middle">
                            <a href="{{ route('tarea', ['proyecto' => $proyecto->proyecto_id]) }}">
                                <i class="fa-solid fa-list-check"></i>
                            </a>
                        </td> --}}
                        <td class="align-middle" title="Ver tareas.">
                            <a href="{{ route('proyecto.tareas.index', ['proyecto' => $proyecto->proyecto_id]) }}">
                                <i class="fa-solid fa-list-check"></i>
                            </a>
                        </td>
                        {{-- <td class="align-middle">
                            <button type="button" class="btn btn-success">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td> --}}
                        <td class="align-middle">
                            <button type="button" class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $proyectos->links() }}
    </div>
@endsection
