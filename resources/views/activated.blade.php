@extends('layouts.main')

@section('content')
    <div class="container">
        <section class="blocked has-text-centered" style="background-image: url({{ asset('images/activated.jpg') }})">
            <h2 class="title">A sua conta foi ativada</h2>
            <h3 class="subtitle">Já pode usofrir das nossas funcionalidades!</h3>
            <div class="is-top-medium">
                <a class="button is-primary is-large" href="{{ route('perfil.index') }}">Meu perfil</a>
            </div>
        </section>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
