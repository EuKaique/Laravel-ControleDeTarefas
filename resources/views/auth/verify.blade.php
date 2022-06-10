@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifique o seu e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Reenviamos um e-mail com o link de validação
                        </div>
                    @endif

                    Antes de continuar para a próxima página, por favor verifique o link que enviamos no seu e-mail.
                    <br><br>
                    Se você não recebeu o e-mail: 
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique aqui para reenviar') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
