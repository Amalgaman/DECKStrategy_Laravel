@extends('layouts.app')

@section('content')

<section id="baner" class="mt-5">
  <h1 class="text-center p-5">Administrador de Cartas</h1>
</section>

<section class="container">
  <div class="row">
    <div class="col p-3 m-3 filtro-usuario">
     <form action="">
      <div class="input-group my-3 ">
        <input type="text" class="form-control" placeholder="Nombre del Usuario" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-primary" type="button" id="button-addon2">Buscar</button>
      </div>
     </form>
    </div>
  </div>
  <div class="row">
    <div class="col mx-2">
    <table class="table" id="tabla-usuarios">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Set</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cartas as $carta)
            <tr>
            <td>{{$carta->nombre}}</td>
            <td>{{$carta->id_set}}</td>
            <td>
                <a href="{{ route('cartas.show', $carta)}}" class="btn btn-success">Ver Carta</a>
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
