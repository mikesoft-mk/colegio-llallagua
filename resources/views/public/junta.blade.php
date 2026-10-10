@extends('layouts.public')
@section('title', 'Junta Escolar | Unidad Educativa Llallagua')
@section('hero') @include('partials.page-banner',['titulo'=>'Junta escolar','descripcion'=>'Trabajo conjunto entre la institución, estudiantes y familias.','imagen'=>'theme/img/banner-junta.png']) @endsection
@section('content')
<section class="content-section"><span class="section-kicker">Comunidad y familias</span><h2>Junta Escolar</h2><p class="lead">La junta escolar fortalece el diálogo y la coordinación para acompañar el proceso educativo de nuestros estudiantes.</p><div class="info-panel"><i class="fas fa-handshake"></i><div><h3>Compromiso compartido</h3><p>Promovemos la participación respetuosa de madres, padres y tutores en las iniciativas de la comunidad educativa.</p></div></div></section>
@endsection
