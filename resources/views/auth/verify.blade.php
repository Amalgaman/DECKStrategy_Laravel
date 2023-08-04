@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se envio un link de verificacion a tu correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Por favor, checkea tu mail para ver el link.') }}
                    {{ __('Si no recibiste el email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clickea acá para reenviar el link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
