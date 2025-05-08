<aside id="sidebar-container" class="sidebar">
    <ul class="list-group">
        @if (Auth::check())
            <li>
                <a href="{{ url('/home') }}" class="list-group-item list-group-item-action" title="Home">
                    <div class="d-flex align-items-center">
                        <div class="iconoDiv">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <span class="menu-text">Home</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ url('proyecto') }}" class="list-group-item list-group-item-action" title="Mis Proyectos">
                    <div class="d-flex align-items-center">
                        <div class="iconoDiv">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <span class="menu-text">Mis Proyectos</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="#" class="list-group-item list-group-item-action" title="Finalizar sesión">
                    <div class="d-flex align-items-center">
                        <div class="iconoDiv">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </div>
                        <span class="menu-text">Finalizar sesión</span>
                    </div>
                </a>
            </li>
        @else
            <li>
                <a href="{{ url('/login') }}" class="list-group-item list-group-item-action" title="Iniciar sesión">
                    <div class="d-flex align-items-center">
                        <div class="iconoDiv">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </div>
                        <span class="menu-text">Login</span>
                    </div>
                </a>
            </li>
        @endif
    </ul>
</aside>
