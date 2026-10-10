@extends('layouts.public')
@section('title', 'Comunicados | Unidad Educativa Llallagua')
@section('hero') @include('partials.page-banner',['titulo'=>'Comunicados','descripcion'=>'Anuncios, actividades y novedades de nuestra institución.','imagen'=>'theme/img/banner-comunicados.jpg']) @endsection
@section('content')
<section class="content-section"><span class="section-kicker">Información oficial</span><h2>Comunicados institucionales</h2><p class="lead">En este espacio publicaremos los avisos dirigidos a estudiantes, familias y personal docente.</p><div class="empty-state"><i class="fas fa-bullhorn"></i><h3>No hay comunicados disponibles</h3><p>Vuelve pronto o revisa nuestra página de Facebook para conocer las últimas novedades.</p><a class="btn btn-primary" href="{{ route('publicaciones') }}">Ver publicaciones</a></div></section>
@endsection
