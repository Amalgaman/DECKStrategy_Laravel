@extends('layouts.app')

@section('content')

<section id="baner" class="mt-5">
  <h1 class="text-center p-5">Administrador de Cartas</h1>
</section>

<section class="container">
  <div class="row">
    <div class="col p-3 m-3">
        @if(Session ('status'))
            <div class="alert alert-success">
                {{ Session('status') }}
            </div>
        @endif
        <a href="{{ route('cartas.create')}}" class="btn btn-primary">Crear Nueva Carta</a>
    </div>
  </div>
  <div class="row">
    <div class="col mx-2">
    <table class="table" id="tabla-usuarios">
      <thead>
        <tr>
        <th scope="col">Imagen</th>
          <th scope="col">Nombre</th>
          <th scope="col">Ataque</th>
          <th scope="col">Salud</th>
          <th scope="col">Set</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cartas as $carta)
            <tr>
            <td>
                <img class="img-fluid" src="{{$carta->img_chica}}" alt="Bootstrap" width="40" height="27">
            </td>
            <td>{{$carta->nombre}}</td>
            <td>{{$carta->ataque}}</td>
            <td>{{$carta->salud}}</td>
            <td>{{$carta->id_set}}</td>
            <td>
                <a href="{{ route('cartas.show', $carta)}}" class="btn btn-success" target="_blank">Ver Carta</a>
            </td>
            </tr>
        @endforeach

      </tbody>
    </table>

    {{ $cartas->links() }}
    </div>
  </div>
</section>

@endsection
