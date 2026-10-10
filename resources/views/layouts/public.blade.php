<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sitio oficial de la Unidad Educativa Llallagua.">
    <title>@yield('title', 'Unidad Educativa Llallagua')</title>
    <link rel="icon" type="image/png" href="{{ asset('theme/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/styles-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/public-school.css') }}">
</head>
<body class="public-site">
    @include('partials.public-top-header')
    @include('partials.public-navbar')

    @hasSection('hero')
        @yield('hero')
    @endif

    <main class="public-main">
        <div class="container public-shell">
            <div class="public-content">
                @yield('content')
            </div>
            <aside class="public-sidebar" aria-label="Información institucional">
                @include('partials.public-sidebar')
            </aside>
        </div>
    </main>

    @include('partials.public-footer')
    @include('partials.public-scripts')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v24.0"></script>
</body>
</html>
