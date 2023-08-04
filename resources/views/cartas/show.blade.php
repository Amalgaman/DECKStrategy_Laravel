@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col my-4 text-center">
            <h1>Detalles de Carta</h1>
        </div>
    </div>

    @if(Session ('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif

    <div class="row text-center">
        <div class="col-10 offset-1">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="{{ $carta->img_grande }}" class="img-fluid rounded-start img-carta-chica" alt="...">
                </div>
                <div class="col-8">
                <div class="card-body">
                    <h3 class="card-title mb-3">{{ $carta->nombre }}</h3>
                    <p class="card-text">Ataque: {{ $carta->ataque }}</p>
                    <p class="card-text">Salud: {{ $carta->salud }}</p>
                    <p class="card-text">Imagen Grande URL: {{ $carta->img_grande }}</p>
                    <p class="card-text">Imagen Chica URL: {{ $carta->img_chica }}</p>
                    <p class="card-text">Imagen Sola URL: {{ $carta->img_sola }}</p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('cartas.edit', $carta)}}" class="btn btn-success">Editar</a>
                        <form action="{{ route('cartas.destroy', $carta)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/confirm.js') }}"></script>

@endsection
