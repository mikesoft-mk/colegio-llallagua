@extends('layouts.public')

@section('title', 'Comunicados')

@section('content')
   @include('partials.page-banner',[
    'titulo'=>'Comunicados',
    'descripcion'=>'Mantente informado sobre anuncios, actividades y novedades de nuestra institución.',
    'imagen'=>'theme/img/banner-comunicados.jpg'
])

<section class="py-5">
    <div class="container">



        <div class="row g-4">
            <!-- Sin comunicados -->
            <div class="col-12">
                <p class="text-muted text-center">
                    No hay comunicados disponibles en este momento.
                </p>
            </div>

            <!-- Comunicado 1
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm">

                    <div class="card-body">

                        <span class="badge bg-danger mb-3">
                            Importante
                        </span>

                        <h5 class="card-title">
                            Reunión de Padres de Familia
                        </h5>

                        <p class="card-text text-muted">
                            Se comunica a todos los padres de familia que la reunión
                            general se realizará el próximo viernes a horas 18:00.
                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">
                        <small class="text-muted">
                            10 de junio de 2026
                        </small>
                    </div>

                </div>
            </div> -->







        </div>

    </div>
</section>

@endsection