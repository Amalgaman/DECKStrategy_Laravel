@extends('layouts.app')

@section('content')
<div class="contenedor">
    <div class="seccion">
        <div>
            <h3 class="text-center">Mazos Populares</h3>
        </div>
        @for ($i = 0; $i < 10; $i++)
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
        @endfor
    </div>
    <div class="seccion" style="">
    <div class="" style="">
            <h3 class="text-center">Mazos Profesionales</h3>
        </div>
        <div class="mazos">
            <h5>Boros aggro</h5>
            <p>por Amalgaman</p>
            <span>Aggro</span>
            <span>Fácil</span>
            <span>meta</span>
        </div>
        <div class="mazos">
            <h5>Dimir Midrange</h5>
            <p>por Amalgaman</p>
            <span>Midrange</span>
            <span>Combo</span>
            <span>Meta</span>
        </div>
        <div class="mazos">
            <h5>Selesnya Tokens</h5>
            <p>por Amalgaman</p>
            <span>Control</span>
            <span>Dificil</span>
            <span>Meta</span>
        </div>
    </div>
    <div class="seccion">
    <div class="">
            <h3 class="text-center">Mazos Meme</h3>
        </div>
        <div class="mazos">
            <h5>Dimir Midrange</h5>
            <p>por Amalgaman</p>
            <span>Midrange</span>
            <span>Combo</span>
            <span>Meta</span>
        </div>
        <div class="mazos">
            <h5>Boros aggro</h5>
            <p>por Amalgaman</p>
            <span>Aggro</span>
            <span>Fácil</span>
            <span>meta</span>
        </div>
        <div class="mazos">
            <h5>Selesnya Tokens</h5>
            <p>por Amalgaman</p>
            <span>Control</span>
            <span>Dificil</span>
            <span>Meta</span>
        </div>
    </div>

    <div id="info">
        <h1>Quienes somos</h1>
        <p>Somos una empresa llena de gente apasionada por los videojuegos y los juegos de mesa, en especial los juegos de cartas. Nuestro objetivo es fomentar una gran comunidad de jugadores donde todos puedan ayudarse y mejorar. Como planes a futuro nos encantaría poder facilitar la organización de torneos y expandirnos a mercados aún más grandes para aumentar la base de jugadores. </p>
    </div>
    </div>
@endsection
