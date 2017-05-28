@extends('layouts.main')

@section('content')
    <div class="container">
        <section class="blocked has-text-centered" style="background-image: url({{ asset('images/activate.jpg') }})">
            <h2 class="title">A sua conta não está ativada</h2>
            <h3 class="subtitle">Deverá ter um email com o link de ativação!</h3>
            <div class="is-top-medium">
                <a href="{{ route('activate.send') }}" class="button is-info is-large">Reenviar Email</a>
            </div>
            @if($token)
                <div class="is-top-medium">
                    <form action="{{ route('activate') }}" method="post">
                        {{ csrf_field() }}
                        <div class="field has-addons is-centered has-text-centered" style="justify-content: center">
                            <p class="control">
                                <input class="input" name="token" type="text" placeholder="Token" value="{{ $token }}">
                            </p>
                            <p class="control">
                                <button type="submit" class="button is-info">
                                    Ativar
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            @endif
        </section>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
