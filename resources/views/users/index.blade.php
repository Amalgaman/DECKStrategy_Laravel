@extends('layouts.app')

@section('content')

<section id="baner" class="mt-5">
  <h1 class="text-center p-5">Administrador de Usuarios</h1>
</section>

<section class="container">
  <div class="row">
    <div class="col p-3 m-3">
        @if(Session ('status'))
            <div class="alert alert-success">
                {{ Session('status') }}
            </div>
        @endif
    </div>
  </div>
  <div class="row text-center">
    <div class="col mx-2">
    <table class="table  shadow-lg" id="tabla-usuarios">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Correo Electronico</th>
          <th scope="col">Permisos</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @if($user->is_admin)
                <td>Administrador</td>
            @else
                <td>Estandar</td>
            @endif
            <td>
                <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary w-100">Cambiar Permisos</button>
                </form>
            </td>
            </tr>
        @endforeach

      </tbody>
    </table>
    <div class="row justify-content-center p-5 z-0">
      <div class="col col-md-5 pagination justify-content-center">
           {{ $users->links() }}
      </div>
  </div>
    </div>
  </div>
</section>

@endsection
