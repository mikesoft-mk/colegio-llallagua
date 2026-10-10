@extends('layouts.public')
@section('title', 'Inicio | Unidad Educativa Llallagua')
@section('hero')
    <header class="home-hero">
        <div id="bannerCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="7000">
            <ol class="carousel-indicators">
                <li data-target="#bannerCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#bannerCarousel" data-slide-to="1"></li>
                <li data-target="#bannerCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active"><img src="{{ asset('theme/img/banner2.png') }}"
                        class="d-block w-100 banner-img" alt="Frontis de la Unidad Educativa Llallagua"></div>
                <div class="carousel-item"><img src="{{ asset('theme/img/banner1.jpg') }}" class="d-block w-100 banner-img"
                        alt="Estudiantes de la Unidad Educativa Llallagua"></div>
                <div class="carousel-item"><img src="{{ asset('theme/img/img5.jpg') }}" class="d-block w-100 banner-img"
                        alt="Actividades de la Unidad Educativa Llallagua"></div>
            </div>
            <div class="banner-overlay"></div>
            <div class="banner-content">
                <div class="container">
                    <div class="hero-copy"><span class="hero-badge"><i class="fas fa-school"></i> Sitio oficial</span>
                        <h1>Unidad Educativa<br>Llallagua</h1>
                        <p>Formamos estudiantes con valores, excelencia académica y compromiso con nuestra sociedad.</p>
                        <div class="hero-actions"><a href="{{ route('comunicados') }}" class="btn btn-primary">Ver
                                comunicados</a><a href="{{ route('calificaciones') }}"
                                class="btn btn-outline-light">Consultar calificaciones</a></div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev"><span
                    class="carousel-control-prev-icon"></span><span class="sr-only">Anterior</span></a><a
                class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next"><span
                    class="carousel-control-next-icon"></span><span class="sr-only">Siguiente</span></a>
        </div>
    </header>
@endsection
@section('content')
    <section class="content-section section-intro"><span class="section-kicker">Nuestra comunidad educativa</span>
        <h2>Educación que acompaña cada etapa</h2>
        <p class="lead">Construimos una comunidad basada en el respeto, la responsabilidad y el deseo de aprender.</p>
    </section>
    <section class="feature-grid">
        <article class="feature-card"><span class="feature-icon"><i class="fas fa-bullseye"></i></span>
            <h3>Misión</h3>
            <p>Brindar una educación integral de calidad, promoviendo conocimientos, valores y habilidades para la vida.</p>
        </article>
        <article class="feature-card"><span class="feature-icon feature-icon-alt"><i class="fas fa-eye"></i></span>
            <h3>Visión</h3>
            <p>Ser una institución reconocida por su excelencia académica, innovación pedagógica y compromiso social.</p>
        </article>
    </section>
    <section class="quick-links">
        <h2>Información para la comunidad</h2>
        <div class="quick-links-grid"><a href="{{ route('comunicados') }}"><i
                    class="fas fa-bullhorn"></i><span>Comunicados</span><small>Noticias y avisos oficiales</small></a><a
                href="{{ route('calificaciones') }}"><i
                    class="fas fa-chart-line"></i><span>Calificaciones</span><small>Consulta de libretas</small></a><a
                href="{{ route('uniforme') }}"><i class="fas fa-user-graduate"></i><span>Uniforme</span><small>Presentación
                    institucional</small></a></div>
    </section>
@endsection
