<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container px-5">

        {{-- Logo --}}
        <a class="navbar-brand" href="{{ route('inicio') }}">
            <img src="{{ asset('theme/img/logo.png') }}"
                 class="logo-navbar"
                 alt="Logo">
        </a>

        {{-- Botón Responsive --}}
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarPrincipal"
                aria-controls="navbarPrincipal"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarPrincipal">

            <ul class="navbar-nav ml-auto w-100 justify-content-end navbar-list">

                @foreach(config('menu') as $item)

                    {{-- MENÚ SIMPLE --}}
                    @if(empty($item['children']))

                        <li class="nav-item">

                            <a class="nav-link text-white {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                               href="{{ route($item['route']) }}">

                                {{ $item['title'] }}

                            </a>

                        </li>

                    @else

                        {{-- DROPDOWN --}}

                        @php

                            $routes = collect($item['children'])
                                        ->pluck('route')
                                        ->toArray();

                            $active = request()->routeIs(...$routes);

                        @endphp

                        <li class="nav-item dropdown">

                            <a class="nav-link text-white dropdown-toggle {{ $active ? 'active' : '' }}"
                               href="#"
                               id="dropdown{{ $loop->index }}"
                               role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">

                                {{ $item['title'] }}

                            </a>

                            <div class="dropdown-menu shadow animated--grow-in bg-submenu ">

                                @foreach($item['children'] as $child)

                                    <a class="text-white bg-text-submenu dropdown-item {{ request()->routeIs($child['route']) ? 'active' : '' }}"
                                       href="{{ route($child['route']) }}">

                                        {{ $child['title'] }}

                                    </a>

                                @endforeach

                            </div>

                        </li>

                    @endif

                @endforeach

                <!-- Solo en móviles -->
<li class="nav-item d-lg-none">
    <hr>
</li>

<li class="nav-item d-lg-none">
    <span class="nav-link">
        <i class="fas fa-phone-alt mr-2"></i>
        +591 12345678
    </span>
</li>

<li class="nav-item d-lg-none">
    <span class="nav-link">
        <i class="fas fa-envelope mr-2"></i>
        secretaria@colegio.edu.bo
    </span>
</li>
            </ul>

        </div>

    </div>

</nav>
