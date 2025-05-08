<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="{{ asset('/gestion_proyectos/public/img/3032548.png') }}" alt="Logo" width="80"
                height="80">
            Project Manager
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <form class="d-flex" role="search">
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Hola, {{ Auth::user()->nombre_u }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ url('/logout') }}">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li>
                            <a class="navbar-login" href="{{ url('/login') }}">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Login
                            </a>
                        </li>
                    @endif
                </ul>
            </form>
        </div>
    </div>
</nav>
