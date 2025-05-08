@extends('layouts.main')

@section('title', 'Home Page')

@section('content')
    {{ $user->nombre_u }}
    <h1>Welcome to the Home Page</h1>
    <p>This is a basic example of how to use a navbar and sidebar in a Laravel layout.</p>
    <button
        style="background-color: #66cc00; color: white; padding: 0.5rem 1rem; border: none; border-radius: 5px; cursor: pointer;">Create
        Project</button>
@endsection
