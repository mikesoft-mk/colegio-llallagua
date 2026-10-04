<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('theme/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/styles-navbar.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
    @include('partials.public-top-header')

    @include('partials.public-navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.public-footer')
    @include('partials.public-scripts')

    <div id="fb-root"></div>

<script async defer crossorigin="anonymous"
src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v24.0">
</script>

</body>
</html>