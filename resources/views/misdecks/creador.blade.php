@extends('layouts.app')

@section('content')
<div class=" mt-5" style="display: flex;flex-direction:column;">
    <div class=>
        <div class="text-center">
            <h1 class="p-5">Creador de Mazo</h1>
        </div>
    </div>
    <div class="" style="display: flex;flex-direction:row;justify-content:space-between;">
        <div ></div>
        <div class="col-8" >
            <div class=""style="display: flex;flex-direction:row;flex-wrap:wrap;justify-content:center;">
            @foreach ($cartas as $carta)
                <div class="col-5 col-lg-2 m-3"><div id="{{$carta->id}}" class="carta-a"><img class="img-fluid img-carta z-1" src="{{$carta->img_grande}}" alt="..."></div></div>
            @endforeach
            </div>
            <div class="row justify-content-center p-5 mt-4">
                <div class="col col-md-5 pagination justify-content-center mt-4">
                    {{ $cartas->links() }}
                </div>
            </div>
        </div>

        <div class="col-3" id="deckbuilder" style="background-color: #523000;">
            <div style="background-color: #C97600;padding:10px">

            <div class="d-flex">
                <input style="margin: 10px;" type="text" name="nombre" id="nombre" placeholder="Nombre del Mazo">
                <span style="margin: 10px;font-size:16px" class="badge text-bg-warning" id="contador">Total: 0/30</span>
            </div>
            <div class="d-flex">
                <input style="margin: 10px;" type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
                <button style="margin: 10px;" id="guardar" type="submit" class="btn btn-warning my-2" onclick="guardar()">Guardar</button>
            </div>
            </div>

        <div id="verDeck">
        </div>
     </div>
    </div>
</div>

<script src="{{ asset('js/creador.js') }}"></script>

@endsection
