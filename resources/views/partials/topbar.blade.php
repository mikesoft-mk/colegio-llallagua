<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" type="button"><i class="fa fa-bars"></i></button>

    <form action="{{ route('busqueda.index') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="search" name="q" value="{{ request('q') }}" class="form-control bg-light border-0 small" placeholder="Buscar docentes, estudiantes o cursos" aria-label="Buscar docentes, estudiantes o cursos" required minlength="2">
            <div class="input-group-append"><button class="btn btn-primary" type="submit" aria-label="Buscar"><i class="fas fa-search fa-sm"></i></button></div>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form action="{{ route('busqueda.index') }}" method="GET" class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="search" name="q" value="{{ request('q') }}" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Buscar" required minlength="2">
                        <div class="input-group-append"><button class="btn btn-primary" type="submit"><i class="fas fa-search fa-sm"></i></button></div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Notificaciones">
                <i class="fas fa-bell fa-fw"></i>
                @if ($notificacionesNoLeidas->isNotEmpty())
                    <span class="badge badge-danger badge-counter">{{ $notificacionesNoLeidas->count() > 9 ? '9+' : $notificacionesNoLeidas->count() }}</span>
                @endif
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">Notificaciones</h6>
                @forelse ($notificacionesNoLeidas as $notificacion)
                    <form action="{{ route('notificaciones.leer', $notificacion) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item d-flex align-items-center text-left border-0 bg-white w-100">
                            <div class="mr-3"><div class="icon-circle bg-{{ $notificacion->data['tipo'] ?? 'primary' }}"><i class="fas fa-bell text-white"></i></div></div>
                            <div>
                                <div class="small text-gray-500">{{ $notificacion->created_at->diffForHumans() }}</div>
                                <span class="font-weight-bold">{{ $notificacion->data['titulo'] ?? 'Notificación' }}</span>
                                <div class="small">{{ $notificacion->data['mensaje'] ?? '' }}</div>
                            </div>
                        </button>
                    </form>
                @empty
                    <div class="dropdown-item text-center small text-gray-500 py-3">No tienes notificaciones nuevas.</div>
                @endforelse
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('theme/img/undraw_profile.svg') }}" alt="Perfil de usuario">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar sesión</a>
            </div>
        </li>
    </ul>
</nav>
