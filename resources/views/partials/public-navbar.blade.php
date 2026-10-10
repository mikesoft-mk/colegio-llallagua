<nav class="navbar navbar-expand-lg navbar-dark public-navbar">
    <div class="container public-navbar-inner">
        <a class="navbar-brand" href="{{ route('inicio') }}" aria-label="Ir al inicio">
            <img src="{{ asset('theme/img/logo.png') }}" class="logo-navbar" alt="Logotipo de la Unidad Educativa Llallagua">
            <span class="brand-name">U.E. LLALLAGUA<small>Unidad Educativa</small></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Abrir menú de navegación"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarPrincipal">
            <ul class="navbar-nav ml-auto navbar-list">
                @foreach(config('menu') as $item)
                    @if(empty($item['children']))
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}" href="{{ route($item['route']) }}">{{ $item['title'] }}</a></li>
                    @else
                        @php($routes = collect($item['children'])->pluck('route')->all())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs(...$routes) ? 'active' : '' }}" href="#" id="dropdown{{ $loop->index }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item['title'] }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown{{ $loop->index }}">
                                @foreach($item['children'] as $child)
                                    <a class="dropdown-item {{ request()->routeIs($child['route']) ? 'active' : '' }}" href="{{ route($child['route']) }}">{{ $child['title'] }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach
                <li class="nav-item d-lg-none nav-mobile-contact"><span><i class="fas fa-phone-alt"></i> +591 12345678</span></li>
            </ul>
        </div>
    </div>
</nav>
