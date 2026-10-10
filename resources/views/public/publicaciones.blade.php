@extends('layouts.public')
@section('title', 'Publicaciones | Unidad Educativa Llallagua')
@section('hero') @include('partials.page-banner',['titulo'=>'Publicaciones','descripcion'=>'Actividades, eventos y noticias de nuestra comunidad educativa.','imagen'=>'theme/img/banner-publicaciones.jpg']) @endsection
@section('content')
<section class="content-section"><span class="section-kicker">Vida escolar</span><h2>Noticias y actividades</h2><p class="lead">Conoce las experiencias y logros que forman parte del día a día de nuestra unidad educativa.</p><div class="empty-state"><i class="fas fa-images"></i><h3>Próximamente habrá nuevas publicaciones</h3><p>Mientras tanto, puedes seguir nuestras actualizaciones desde la barra lateral.</p></div></section>
@endsection
