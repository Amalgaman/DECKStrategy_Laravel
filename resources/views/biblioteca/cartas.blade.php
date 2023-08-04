@extends('layouts.app')

@section('content')
<style>
    /* Estilo inicial de la imagen */
    .image-container {
        overflow: hidden; /* Oculta el contenido que desborda */
        height: 100%; /* Ajusta la altura del contenedor */
        display: flex; /* Activa el modo flex para alinear la imagen */
        justify-content: center; /* Centra la imagen horizontalmente */
        align-items: center; /* Centra la imagen verticalmente */
    }

    /* Estilo de la imagen cuando el mouse está sobre ella */
    .img-fluid:hover {
        transform: scale(2.0); /* Escala la imagen al 120% */
        transition: transform 0.3s ease; /* Añade una transición suave */
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col text-center p-5">
            <h1>Biblioteca de cartas</h1>
        </div>
    </div>
    <div class="row justify-content-evenly mt-3 text-center">
    @foreach ($cartas as $carta)
        <div class="col-5 col-lg-2 m-3"><img class="img-fluid" src="{{$carta->img_chica}}" alt="..."></div>
    @endforeach
    </div>
    <div class="row justify-content-center p-5">
        <div class="col col-md-5 pagination justify-content-center">
             {{ $cartas->links() }}
        </div>
    </div>
</div>


@endsection
