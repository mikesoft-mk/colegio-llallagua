@extends('layouts.public')

@section('title', 'Junta Escolar')
@section('content')
@include('partials.page-banner',[
    'titulo'=>'Junta Escolar',
    'descripcion'=>'Información sobre la estructura y funcionamiento de la junta escolar.',
    'imagen'=>'theme/img/banner-junta.png'
])

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Junta Escolar</h2>
            <p class="text-muted">
                Información sobre la estructura y funcionamiento de la junta escolar.
            </p>
        </div>


@endsection