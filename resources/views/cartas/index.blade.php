@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cartas') }}</div>

                <div class="card-body">
                    <ul>
                       @foreach ($cartas as $carta)
                        <li>
                            {{ $carta->nombre}}
                        </li>
                       @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
