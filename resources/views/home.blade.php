@extends('layouts.main')

@section('content')
    <div id="hero" style="background-image: url({{ asset('images/hero.jpg') }})">
        <div class="container">
            <div class="heading">
                <h1><span>Print</span>IT</h1>
            </div>
            <div class="print-number">
                {{ $requestsNumber }}
                <span>Impressões</span>
            </div>
            <div class="cta-account">
                @if (auth()->check())
                    <a class="button is-primary is-large" href="{{ route('perfil.index') }}">Meu perfil</a>

                @else
                    <a class="button is-primary is-large" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </div>
    </div>
    <section id="fight">
        <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Cores</p>
                    <p class="title">{{ $coloredRequests->count() }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Preto & branco</p>
                    <p class="title">{{ $blackAndWhiteRequests->count() }}</p>
                </div>
            </div>
        </nav>
    </section>

    <section id="departamentos">
        <div class="container">
            <h2 class="title is-2 is-inline">Departamentos com mais Impressões</h2>
            <div class="content">
                <div class="columns is-multiline ">

                    @foreach($departments as $department)
                        <div class="column is-one-third">
                            <div class="box">
                                    <p class="title is-3 has-text-centered">
                                        {{ $department->requests()->done()->count() }}
                                    </p>
                                    <a class="card-header-icon">
                                        {{ $department->name }}
                                    </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="has-text-centered">
                    <a href="{{ route('departmentsAsGuest') }}" class="button is-info is-large">Ver Departamentos</a>
                </div>
            </div>
        </div>
    </section>
    <section id="status">
        <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Hoje</p>
                    <p class="title">{{ $todayRequests->count() }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Mês</p>
                    <p class="title">{{ $mouthRequests->count() }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Média por dia</p>
                    <p class="title">{{ $averagePerMouth }}</p>
                </div>
            </div>
        </nav>
    </section>
    <div class="parallax-window is-full-centered"  data-parallax="scroll" data-image-src="{{ asset('images/contactos.jpg') }}">
        <div class="has-text-centered is-item">
            <h2 class="title is-colored-white">Veja todos os Contactos!</h2>
            <a href="" class="button is-primary is-large">Contactos</a>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
