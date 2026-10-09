<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Panel principal')</title>

    <!-- FontAwesome -->
    <link href="{{ asset('theme/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('theme/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

<div id="wrapper">

    @include('partials.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('partials.topbar')
            @include('charts')

            <div class="container-fluid">

                @yield('content')

            </div>

        </div>

        @include('partials.footer')

    </div>

</div>

@include('partials.scripts')

</body>
</html>