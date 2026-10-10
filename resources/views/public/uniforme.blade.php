@extends('layouts.public')

@section('title', 'Uniforme Escolar | Unidad Educativa Llallagua')

@section('hero')
    @include('partials.page-banner', [
        'titulo' => 'Uniforme escolar',
        'descripcion' => 'Presentación, identidad y compromiso con nuestra institución.',
        'imagen' => 'theme/img/banner-uniforme.jpg',
    ])
@endsection

@section('content')
    <section class="content-section">
        <span class="section-kicker">Identidad institucional</span>
        <h2>Presentación de nuestros estudiantes</h2>
        <p class="lead">El uniforme representa la pertenencia a la Unidad Educativa Llallagua y acompaña la formación de hábitos de orden y respeto.</p>

        <div class="uniform-gallery" aria-label="Uniformes principales de la Unidad Educativa Llallagua">
            <figure class="uniform-card">
                <img src="{{ asset('theme/img/img21.jpeg') }}" alt="Primer uniforme principal de la Unidad Educativa Llallagua" loading="lazy">
                <figcaption>Uniforme principal</figcaption>
            </figure>

            <figure class="uniform-card">
                <img src="{{ asset('theme/img/img22.jpeg') }}" alt="Segundo uniforme principal de la Unidad Educativa Llallagua" loading="lazy">
                <figcaption>Uniforme deportivo</figcaption>
            </figure>
        </div>

        <div class="info-panel">
            <i class="fas fa-user-graduate"></i>
            <div>
                <h3>Uso responsable</h3>
                <p>Recomendamos mantener una presentación limpia y ordenada durante las actividades académicas y actos institucionales.</p>
            </div>
        </div>
    </section>
@endsection
