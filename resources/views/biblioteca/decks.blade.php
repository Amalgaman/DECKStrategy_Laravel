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
                <div class="fondo" style="background-image: url('{{ $deck->img }}');">
                @foreach ($deck->colores as $color)
                    @if($color == "B")
                    <img src="./img/logo-blanco.png" alt="asas">
                    @endif
                    @if($color == "A")
                    <img src="./img/logo-azul.png" alt="asas">
                    @endif
                    @if($color == "R")
                    <img src="./img/logo-rojo.png" alt="asas">
                    @endif
                    @if($color == "N")
                    <img src="./img/logo-negro.png" alt="asas">
                    @endif
                    @if($color == "V")
                    <img src="./img/logo-Verde.png" alt="asas">
                    @endif
                    @if($color == "I")
                    <img src="./img/logo-incoloro.png" alt="asas">
                    @endif
                @endforeach
                </div>
                <h3>{{ $deck->nombre }}</h3>
                <p>{{ $deck->descripcion }}</p>
            </div>
            <span>Creado por {{ $deck->id_user }}</span>
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
