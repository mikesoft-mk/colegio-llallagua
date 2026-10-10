@extends('layouts.public')
@section('title', 'Calificaciones | Unidad Educativa Llallagua')
@section('hero') @include('partials.page-banner',['titulo'=>'Calificaciones','descripcion'=>'Consulta el desempeño académico de tus hijos de forma segura.','imagen'=>'theme/img/banner1.jpg']) @endsection
@section('content')
<section class="content-section"><span class="section-kicker">Consulta académica</span><h2>Calificaciones y libretas</h2><p class="lead">Ingresa los datos solicitados para consultar las calificaciones disponibles del estudiante.</p><div class="action-card"><i class="fas fa-chart-line"></i><div><h3>Consulta en línea</h3><p>Accede a la plataforma de consulta con el documento de identidad y la fecha de nacimiento del estudiante.</p><a class="btn btn-primary" href="{{ route('consultas.index') }}">Consultar calificaciones</a></div></div></section>
@endsection
