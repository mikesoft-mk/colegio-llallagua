@extends('layouts.public')

@section('title', 'Gobierno Estudiantil')
@section('content')
@include('partials.page-banner',[
    'titulo'=>'Gobierno Estudiantil',
    'descripcion'=>'Información sobre la estructura y funcionamiento del gobierno Estudiantil.',
    'imagen'=>'theme/img/banner-gobierno.jpg'
])

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Gobierno Estudiantil</h2>
            <p class="text-muted">
                Información sobre la estructura y funcionamiento del gobierno Estudiantil.
            </p>
        </div>


@endsection