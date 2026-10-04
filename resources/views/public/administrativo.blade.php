@extends('layouts.public')

@section('title', 'Administrativo')
@section('content')
@include('partials.page-banner',[
    'titulo'=>'Administrativo',
    'descripcion'=>'Información y recursos relacionados con la gestión administrativa del colegio.',
    'imagen'=>'theme/img/banner-administrativo.jpg'
])

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Administrativo</h2>
            <p class="text-muted">
                Información y recursos relacionados con la gestión administrativa del colegio.
            </p>
        </div>


@endsection