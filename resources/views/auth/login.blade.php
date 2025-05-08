@extends('layouts.main')

@section('title', 'LogIn Page')

@section('content')

    @include('partials.mensajes')

    <form action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required autofocus>
        </div>
        <div class="row mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12 d-flex flex-row-reverse">
                <a href="{{ url('/') }}" class="btn btn-secondary float-right ms-1">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-primary float-right">
                    Aceptar
                </button>
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-primary">Iniciar Sesión</button> --}}
    </form>
@endsection
