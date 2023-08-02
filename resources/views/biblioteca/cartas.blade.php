@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col text-center p-5">
            <h1>Biblioteca de cartas</h1>
        </div>
    </div>
    <div class="row justify-content-evenly mt-3 text-center">
    @foreach ($cartas as $carta)
        <div class="col-5 col-lg-2 m-3"><img class="img-fluid" src="{{$carta->img_chica}}" alt="..."></div>
    @endforeach
    </div>
    <div class="row justify-content-center img-fluid p-5">
        <div class="col col-md-5 pagination justify-content-center">
             {{ $cartas->links() }}
        </div>
    </div>
</div>


@endsection
