<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/main.css', 'resources/css/navbar.css', 'resources/css/sidebar.css', 'resources/css/tareas.scss', 'resources/css/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('/img/3032548.png') }}">
</head>

<body>
    @include('layouts.navbar')

    <div class="page">
        <div class="sidebar">
            @include('layouts.sidebar')
        </div>
        <div class="contenido">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
