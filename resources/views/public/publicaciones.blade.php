@extends('layouts.public')

@section('title', 'Publicaciones')

@section('content')
@include('partials.page-banner',[
    'titulo'=>'Publicaciones',
    'descripcion'=>'Explora nuestras publicaciones y eventos relacionados con nuestra institución.',
    'imagen'=>'theme/img/banner-publicaciones.jpg'
])

@include('partials.public-facebook')

@endsection