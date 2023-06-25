@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>Detalles de Carta</h1>
        </div>
    </div>

    @if(Session ('status'))
        <div class="alert alert-success">
            {{ Session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="{{ $carta->img_grande }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $carta->nombre }}</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('cartas.edit', $carta)}}" class="btn btn-success">Editar</a>
                        <form action="{{ route('cartas.destroy', $carta)}}">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>
@endsection
