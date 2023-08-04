@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col text-center p-5">
            <h1>Biblioteca de cartas</h1>
        </div>
    </div>
    <div class="row justify-content-evenly mt-3 mb-5 text-center z-1">
    @foreach ($cartas as $carta)
        <div class="col-5 col-lg-2 m-3">
        <h1 class="position-relative top-50 end-0 translate-middle" ><span class="badge text-bg-primary">x4</span></h1>
        <img class="img-fluid img-carta" src="{{$carta->img_grande}}" alt="...">
        </div>
    @endforeach
    </div>
</div>


@endsection