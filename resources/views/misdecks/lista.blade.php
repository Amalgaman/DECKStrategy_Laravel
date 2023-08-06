@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col text-center p-5">
            <h1>Biblioteca de Mazos</h1>
        </div>
    </div>
    <div class="row justify-content-evenly mt-3 mb-5 z-1">
    @foreach ($decks as $deck)
        <a class="deck" href="{{ route('decks.show', $deck)}}">
            <div>
                <div class="fondo" style="background-image: url('https://cards.scryfall.io/art_crop/front/7/2/72864eb8-c5b6-4f01-b511-124acffc9bfc.jpg?1681987949%27');">
                    <img src="./img/logo-blanco.png" alt="asas">
                    <img src="./img/logo-blanco.png" alt="asas">
                    <img src="./img/logo-blanco.png" alt="asas">
                    <img src="./img/logo-blanco.png" alt="asas">
                </div>
                <h3>{{ $deck->nombre }}</h3>
                <p>{{ $deck->descripcion }}</p>
            </div>
            <span>{{ $deck->id_user }}</span>
        </a>
    @endforeach
    </div>
    <div class="row justify-content-center p-5 z-0">
        <div class="col col-md-5 pagination justify-content-center">
             {{ $decks->links() }}
        </div>
    </div>
</div>


@endsection
