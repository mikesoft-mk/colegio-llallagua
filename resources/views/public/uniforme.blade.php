@extends('layouts.public')

@section('title', 'Uniforme Escolar')
@section('content')
@include('partials.page-banner',[
    'titulo'=>'Uniforme Escolar',
    'descripcion'=>'Información sobre el uniforme escolar y sus especificaciones.',
    'imagen'=>'theme/img/banner-uniforme.jpg'
])

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Uniforme</h2>
            <p class="text-muted">
                Información sobre el uniforme escolar y sus especificaciones.
            </p>
        </div>


@endsection