<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-school"></i></div>
        <div class="sidebar-brand-text mx-3">U.E. LLALLAGUA</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel principal</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Gestión</div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegistro" aria-expanded="true" aria-controls="collapseRegistro">
            <i class="fas fa-fw fa-cog"></i>
            <span>Registro</span>
        </a>
        <div id="collapseRegistro" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('profesores.vista') }}">Usuarios</a>
                <a class="collapse-item" href="{{ route('director.asignaciones.index') }}">Asignaciones</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
