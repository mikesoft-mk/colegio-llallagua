@extends('layouts.public')
@section('title', 'Nuestra Historia | Unidad Educativa Llallagua')
@section('hero') @include('partials.page-banner',['titulo'=>'Nuestra historia','descripcion'=>'Conoce los hitos que han dado forma a nuestra institución.','imagen'=>'theme/img/banner-historia.jpg']) @endsection
@section('content')
<section class="content-section"><span class="section-kicker">Trayectoria institucional</span><h2>Una historia construida en comunidad</h2><p class="lead">Nuestro colegio crece junto a las familias y estudiantes de Llallagua, preservando el compromiso con una educación de calidad.</p><div class="timeline"><article><span>1980</span><h3>Fundación del colegio</h3><p>La institución nace con el propósito de ofrecer formación integral a la comunidad local.</p></article><article><span>1995</span><h3>Crecimiento y reconocimiento</h3><p>Consolidamos nuestra labor académica y el vínculo con las familias de nuestra comunidad.</p></article><article><span>Hoy</span><h3>Miramos hacia el futuro</h3><p>Seguimos formando estudiantes responsables, solidarios y preparados para nuevos desafíos.</p></article></div></section>
@endsection
