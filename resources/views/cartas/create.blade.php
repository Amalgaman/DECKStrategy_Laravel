@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('cartas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ataque</label>
                    <input type="number" class="form-control" name="ataque" id="ataque" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Salud</label>
                    <input type="number" class="form-control" name="salud" id="salud" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">IMG Grande</label>
                    <input type="text" class="form-control" name="img_grande" id="img_grande" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">IMG Chica</label>
                    <input type="text" class="form-control" name="img_chica" id="img_chica" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">IMG Sola</label>
                    <input type="text" class="form-control" name="img_sola" id="img_sola" aria-describedby="emailHelp">
                </div>

                    <select class="form-select" aria-label="Default select example" name="id_set" id="id_set">
                        @foreach ($sets as $set)
                            <option value="{{$set->id}}">{{$set->nombre}}</option>
                        @endforeach
                    </select>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection
