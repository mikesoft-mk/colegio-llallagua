@extends('layouts.public')
@section('title', 'Gobierno Estudiantil | Unidad Educativa Llallagua')
@section('hero') @include('partials.page-banner',['titulo'=>'Gobierno estudiantil','descripcion'=>'Participación, liderazgo y representación de nuestros estudiantes.','imagen'=>'theme/img/banner-gobierno.jpg']) @endsection
@section('content')
<section class="content-section"><span class="section-kicker">Participación estudiantil</span><h2>Voces que construyen comunidad</h2><p class="lead">El gobierno estudiantil fomenta el liderazgo, la responsabilidad y la participación activa en la vida institucional.</p><div class="info-panel"><i class="fas fa-users"></i><div><h3>Representación responsable</h3><p>Los estudiantes aportan propuestas, participan en actividades y colaboran en la construcción de un colegio más inclusivo.</p></div></div></section>
@endsection
