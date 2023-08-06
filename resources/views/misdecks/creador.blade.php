@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col text-center">
            <h1 class="p-5">Creador de Mazo</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="row justify-content-evenly mt-3">
            @foreach ($cartas as $carta)
                <div class="col-5 col-lg-2 m-3"><div id="{{$carta->id}}" class="carta-a"><img class="img-fluid img-carta z-1" src="{{$carta->img_grande}}" alt="..."></div></div>
            @endforeach
            </div>
            <div class="row justify-content-center p-5">
                <div class="col col-md-5 pagination justify-content-center">
                    {{ $cartas->links() }}
                </div>
            </div>
        </div>

        <div class="col-3" id="deckbuilder">

            <div class="d-flex">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre del Mazo">
                <span class="badge text-bg-primary" id="contador">Total: 0/30</span>
            </div>
            <div class="d-flex">
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
                <button id="guardar" type="submit" class="btn btn-primary my-2" onclick="guardar()">Guardar</button>
            </div>

        <div id="verDeck">
        </div>
     </div>
    </div>
</div>

<script src="{{ asset('js/creador.js') }}"></script>

@endsection
