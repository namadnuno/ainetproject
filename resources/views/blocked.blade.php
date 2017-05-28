@extends('layouts.main')

@section('content')
    <div class="container">
        <section class="blocked has-text-centered" style="background-image: url({{ asset('images/blocked.jpg') }})">
            <h2 class="title">Foste Bloqueado</h2>
            <h3 class="subtitle">Contacte o suport para mais informações!</h3>
        </section>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
