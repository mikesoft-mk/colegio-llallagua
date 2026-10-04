@extends('layouts.public')

@section('title', 'Inicio')

@section('content')

<header class="bg-light">

    <div id="bannerCarousel"
     class="carousel slide carousel-fade"
     data-ride="carousel"
     data-interval="7000">

    <!-- Indicadores -->

    <ol class="carousel-indicators">

        <li data-target="#bannerCarousel"
            data-slide-to="0"
            class="active"></li>

        <li data-target="#bannerCarousel"
            data-slide-to="1"></li>

        <li data-target="#bannerCarousel"
            data-slide-to="2"></li>

    </ol>

    <!-- Slides -->

    <div class="carousel-inner">

        <div class="carousel-item active">

            <img src="{{ asset('theme/img/banner1.jpg') }}"
                 class="d-block w-100 banner-img"
                 alt="Frontis">

        </div>

        <div class="carousel-item">

            <img src="{{ asset('theme/img/banner2.png') }}"
                 class="d-block w-100 banner-img"
                 alt="Alumnado">

        </div>

        <div class="carousel-item">

            <img src="{{ asset('theme/img/banner3.png') }}"
                 class="d-block w-100 banner-img"
                 alt="Logro">

        </div>

    </div>

    <!-- Overlay -->

    <div class="banner-overlay"></div>

    <!-- Contenido -->

    <div class="banner-content">

        <div class="container">

            <div class="row">

                <div class="col-lg-7 pt-3">

                    <span class="hero-badge bg-primary">

                        Sitio Oficial

                    </span>

                    <h1>

                        UNIDAD EDUCATIVA
                        <br>
                        LLALLAGUA

                    </h1>

                    <p>

                        Formando estudiantes con valores,
                        excelencia académica y compromiso
                        con la sociedad.

                    </p>

                    <a href="{{ route('comunicados') }}"
                       class="btn bg-primary btn-lg mr-3">

                        Comunicados

                    </a>

                    <a href="{{ route('calificaciones') }}"
                       class="btn btn-outline-light btn-lg">

                        Calificaciones

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- Flechas -->

    <a class="carousel-control-prev"
       href="#bannerCarousel"
       role="button"
       data-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </a>

    <a class="carousel-control-next"
       href="#bannerCarousel"
       role="button"
       data-slide="next">

        <span class="carousel-control-next-icon"></span>

    </a>

</div>

</header>

        <section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Misión y Visión</h2>
            <p class="text-muted">
                Comprometidos con la formación integral de nuestros estudiantes.
            </p>
        </div>

        <div class="row g-4">

            <!-- Misión -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-body text-center p-5">

                        <div class="mb-4">
                            <i class="fas fa-bullseye fs-1 text-primary"></i>
                        </div>

                        <h3 class="fw-bold text-primary">
                            Misión
                        </h3>

                        <p class="mt-3 text-muted">
                            Brindar una educación integral de calidad,
                            promoviendo valores, conocimientos y habilidades
                            que permitan a los estudiantes desarrollarse
                            académica, social y humanamente.
                        </p>

                    </div>
                </div>
            </div>

            <!-- Visión -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-body text-center p-5">

                        <div class="mb-4">
                            <i class="fas fa-eye fs-1 text-info"></i>
                        </div>

                        <h3 class="fw-bold text-info">
                            Visión
                        </h3>

                        <p class="mt-3 text-muted">
                            Ser una institución educativa reconocida por
                            su excelencia académica, innovación pedagógica
                            y formación de ciudadanos comprometidos con el
                            desarrollo de la sociedad.
                        </p>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
</section>
@include('partials.public-facebook')

@endsection
