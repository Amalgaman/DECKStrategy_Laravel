@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col text-center">
            <h1>Creador de Mazo</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="row justify-content-evenly mt-3">
            @foreach ($cartas as $carta)
                <div class="col-5 col-lg-2 m-3"><a href="" id="{{$carta->id}}"><img class="img-fluid" src="{{$carta->img_chica}}" alt="..."></a></div>
            @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col col-md-5">
                    {{ $cartas->links() }}
                </div>
            </div>
        </div>
        <div class="col-3" id="deckbuilder">
        <form action="{{ route('misdecks.createDeck') }}" method="POST">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del Mazo">
            <button type="submit" class="btn btn-primary my-2">Guardar</button>
        </form>
        @foreach ($mazo as $carta)
        <div class="carta-en-mazo d-flex justify-content-between my-2 px-2">
            <p>{{$carta->nombre}}</p>
            <div class="d-flex">
                <img class="img-logo-carta-en-mazo" src="./img/logo-rojo.png" alt="...">
            </div>
        </div>
        @endforeach
     </div>
    </div>
</div>


@endsection
