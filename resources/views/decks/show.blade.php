@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col text-center mt-5">
            <h1>Lista del Mazo: {{ $deck->nombre }}</h1>
            <h3 class="m-5">{{ $deck->descripcion }}</h3>
        </div>
    </div>
    <div class="row justify-content-evenly  mb-5 text-center">
    @foreach ($cartas as $carta)
        <div class="col-5 col-lg-2 m-3 img-carta">
        <h1 class="position-relative top-50 end-0 translate-middle " ><span class="badge text-bg-primary">x{{ $carta->copias }}</span></h1>
        <img class="img-fluid " src="{{$carta->img_grande}}" alt="...">
        </div>
    @endforeach
    </div>
</div>


@endsection
