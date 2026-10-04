@extends('layouts.public')

@section('title', 'Calificaciones')

@section('content')
@include('partials.page-banner',[
    'titulo'=>'Calificaciones',
    'descripcion'=>'Consulta las calificaciones de tus hijos y mantente al tanto de su desempeño académico.',
    'imagen'=>'theme/img/banner-calificaciones.jpg'
])

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Calificaciones</h2>
            <p class="text-muted">
                Consulta las calificaciones de tus hijos y mantente al tanto de su desempeño académico.
            </p>
        </div>


@endsection