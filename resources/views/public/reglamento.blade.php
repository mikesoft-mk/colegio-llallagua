@extends('layouts.public')

@section('title', 'Reglamento')
@section('content')
@include('partials.page-banner',[
    'titulo'=>'Reglamento',
    'descripcion'=>'Consulta el reglamento del colegio y mantente al tanto de las normas y políticas establecidas.',
    'imagen'=>'theme/img/banner-reglamento.jpg'
])

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Reglamento</h2>
            <p class="text-muted">
                Consulta el reglamento del colegio y mantente al tanto de las normas y políticas establecidas.
            </p>
        </div>


@endsection