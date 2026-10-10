@extends('layouts.public')
@section('title', 'Administrativo | Unidad Educativa Llallagua')
@section('hero') @include('partials.page-banner',['titulo'=>'Área administrativa','descripcion'=>'Información y recursos para las gestiones institucionales.','imagen'=>'theme/img/banner-administrativo.jpg']) @endsection
@section('content')
<section class="content-section"><span class="section-kicker">Gestiones institucionales</span><h2>Área administrativa</h2><p class="lead">Encuentra información útil para los trámites y actividades administrativas de nuestra unidad educativa.</p><div class="info-panel"><i class="fas fa-folder-open"></i><div><h3>Atención a la comunidad</h3><p>Para una atención más ágil, consulta los comunicados o comunícate con secretaría mediante los datos de contacto de esta página.</p></div></div></section>
@endsection
