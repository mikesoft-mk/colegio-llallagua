@extends('layouts.public')

@section('title', 'Nuestra Historia')
@section('content')
@include('partials.page-banner',[
    'titulo'=>'Nuestra Historia',
    'descripcion'=>'Descubre la evolución y los hitos más importantes de nuestro colegio a lo largo del tiempo.',
    'imagen'=>'theme/img/banner-historia.jpg'
])

<section class="py-5">
    <div class="container">

       <!--Banner-->



        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100 shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title">
                            Fundación del Colegio
                        </h5>

                        <p class="card-text text-muted">
                            El colegio fue fundado en el año 1980 con el objetivo de brindar educación de calidad a la comunidad local.
                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">
                        <small class="text-muted">
                            1980
                        </small>
                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100 shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title">
                            Expansión y Reconocimiento
                        </h5>

                        <p class="card-text text-muted">
                            A lo largo de los años, el colegio ha crecido y ha recibido reconocimiento por su excelencia académica y compromiso con la comunidad.
                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">
                        <small class="text-muted">
                            1995
                        </small>
                    </div>

                </div>
            </div>



@endsection