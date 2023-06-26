@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center py-5">Editar Carta</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col justify-content-center">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form class="py-3 px-4" action="{{ route('cartas.update', $carta) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-2">
                    <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp" value="{{$carta->nombre}}">
                    </div>
                    <div class="col">
                            <label for="id_set" class="form-label">Set</label>
                        <select class="form-select" aria-label="Default select example" name="id_set" id="id_set">
                            @foreach ($sets as $set)
                                <option @if($set->id == $carta->id_set) selected @endif value="{{$set->id}}">{{$set->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-1">
                            <label for="exampleInputEmail1" class="form-label">Ataque</label>
                            <input type="number" class="form-control" name="ataque" id="ataque" aria-describedby="emailHelp" value="{{$carta->ataque}}">
                        </div>
                        <div class="col-1">
                            <label for="exampleInputEmail1" class="form-label">Salud</label>
                            <input type="number" class="form-control" name="salud" id="salud" aria-describedby="emailHelp" value="{{$carta->salud}}">
                        </div>
                        <div class="col-10 pe-0">
                            <label class="form-label">Color</label>
                            <div class="d-flex justify-content-around">
                                <div class="form-check">
                                    <label class="form-check-label" for="checkBlanco">
                                        <img src="../../img/logo-blanco.png" alt="logo de DECKStrategy" width="32">
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="" id="checkBlanco">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkAzul">
                                    <label class="form-check-label" for="checkAzul">
                                        <img src="../../img/logo-azul.png" alt="logo de DECKStrategy" width="32">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkNegro">
                                    <label class="form-check-label" for="checkNegro">
                                        <img src="../../img/logo-negro.png" alt="logo de DECKStrategy" width="32">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkRojo">
                                    <label class="form-check-label" for="checkRojo">
                                        <img src="../../img/logo-rojo.png" alt="logo de DECKStrategy" width="32">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkVerde">
                                    <label class="form-check-label" for="checkVerde">
                                        <img src="../../img/logo-verde.png" alt="logo de DECKStrategy" width="32">
                                    </label>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="row mb-2 ">
                    <div class="col">
                    <label for="exampleInputEmail1" class="form-label">URL Imagen Grande</label>
                    <input type="text" class="form-control" name="img_grande" id="img_grande" aria-describedby="emailHelp" value="{{$carta->img_grande}}">
                        </div>
                        <div class="col">
                        <label for="exampleInputEmail1" class="form-label">URL Imagen Chica</label>
                    <input type="text" class="form-control" name="img_chica" id="img_chica" aria-describedby="emailHelp" value="{{$carta->img_chica}}">
                        </div>
                        <div class="col">
                        <label for="exampleInputEmail1" class="form-label">URL Imagen Sola</label>
                        <input type="text" class="form-control" name="img_sola" id="img_sola" aria-describedby="emailHelp" value="{{$carta->img_sola}}">
                        </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 mx-auto">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                    <div class="col-6 mx-auto">
                        <a href="{{ route('cartas.show', $carta)}}" class="btn btn-danger w-100">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
