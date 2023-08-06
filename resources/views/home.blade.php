@extends('layouts.app')

@section('content')
<section id="baner" class="mt-5">
  <h1 class="text-center p-5">Bienvenido a DECKStrategy</h1>
  <a href="#info" class="btn btn-secondary mt-2" >Conocenos</a>
</section>

<div class="contenedor">
    <div class="seccion">
        <div>
            <h3 class="text-center">Mazos Populares</h3>
        </div>
        @for ($i = 0; $i < 3; $i++)
        <a class="deck" href="{{ route('decks.show', $decks[$i])}}">
            <div>
                <div class="fondo" style="background-image: url('{{ $decks[$i]->img }}');">
                @foreach ($decks[$i]->colores as $color)
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
                <h3>{{ $decks[$i]->nombre }}</h3>
                <p>{{ $decks[$i]->descripcion }}</p>
            </div>
            <span>Creado por {{ $decks[$i]->id_user }}</span>
        </a>
        @endfor
    </div>
    <div class="seccion" style="">
    <div class="" style="">
            <h3 class="text-center">Mazos Profesionales</h3>
        </div>
        @for ($i = 3; $i < 6; $i++)
        <a class="deck" href="{{ route('decks.show', $decks[$i])}}">
            <div>
                <div class="fondo" style="background-image: url('{{ $decks[$i]->img }}');">
                @foreach ($decks[$i]->colores as $color)
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
                <h3>{{ $decks[$i]->nombre }}</h3>
                <p>{{ $decks[$i]->descripcion }}</p>
            </div>
            <span>Creado por {{ $decks[$i]->id_user }}</span>
        </a>
        @endfor
    </div>
    <div class="seccion">
    <div class="">
            <h3 class="text-center">Mazos Meme</h3>
        </div>
        @for ($i = 6; $i < 9; $i++)
        <a class="deck" href="{{ route('decks.show', $decks[$i])}}">
            <div>
                <div class="fondo" style="background-image: url('{{ $decks[$i]->img }}');">
                @foreach ($decks[$i]->colores as $color)
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
                <h3>{{ $decks[$i]->nombre }}</h3>
                <p>{{ $decks[$i]->descripcion }}</p>
            </div>
            <span>Creado por {{ $decks[$i]->id_user }}</span>
        </a>
        @endfor
    </div>

    <div id="info">
        <h1>¿Quienes somos?</h1>
        <p>Somos una empresa llena de gente apasionada por los videojuegos y los juegos de mesa, en especial los juegos de cartas. Nuestro objetivo es fomentar una gran comunidad de jugadores donde todos puedan ayudarse y mejorar. Como planes a futuro nos encantaría poder facilitar la organización de torneos y expandirnos a mercados aún más grandes para aumentar la base de jugadores. </p>
        <p>Ademas de proponer herramientas interactivas que faciliten la experiencia de los jugadores de todo tipo de juegos de mesa y videojuegos, si sos jugador de Magic animate a probar nuestra pagina.</p>
        <a href="">atencion.cliente@DECKStrategy.com</a>
    </div>
    </div>
@endsection
