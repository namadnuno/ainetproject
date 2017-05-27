@extends('layouts.main')

@section('content')
    <div id="hero" style="background-image: url({{ asset('images/hero.jpg') }})">
        <div class="container">
            <div class="heading">
                <h1><span>Print</span>IT</h1>
            </div>
            <div class="print-number">
                {{ $requestsNumber }}
                <span style="font-size: 30px">Impressões</span>
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
                    <p class="title">
                        @if($requestsNumber != 0)
                            {{ number_format($coloredRequests->count()/$requestsNumber * 100, 1) }} %
                        @else
                            {{ 0 }}
                        @endif
                    </p>
                    <p class="sub-title">Cores</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title">
                        @if($requestsNumber != 0)
                            {{ number_format($blackAndWhiteRequests->count()/$requestsNumber * 100, 1) }} %
                        @else
                            {{ 0 }}
                        @endif
                    </p>
                    <p class="sub-title">Preto & branco</p>
                </div>
            </div>
        </nav>
    </section>

    <section id="departamentos">
        <div class="container">
            <h2 class="title is-2 is-inline">Departamentos </h2>
            <div class="content">
                <div class="columns">
                    @foreach($departments as $department)
                        <div class="column is-one-third" style="padding-top: 60px">
                            <div class="box ">
                                <div class="level">
                                    <div class="has-text-centered level-item">
                                        <div>
                                            <p class="title">
                                                {{ $department->requests()->done()->count() }} /
                                                <span class="title is-5">{{ $department->requests()->count() }} </span>
                                            </p>
                                            <p class="sub-title">
                                                Pedidos de impressão
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('departments.show', $department) }}" class="card-header-icon" style="padding-bottom: 41px">
                                    <span class="icon">
                                        <i class="fa fa-building"></i>
                                    </span>
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
                    <p class="title">{{ $todayRequests->count() }}</p>
                    <p class="sub-title">Hoje</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title">{{ $mouthRequests->count() }}</p>
                    <p class="sub-title">Mês</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title">{{ $averagePerMouth }}</p>
                    <p class="sub-title">Média por dia</p>
                </div>
            </div>
        </nav>
    </section>
    <div class="parallax-window is-full-centered"  data-parallax="scroll" data-image-src="{{ asset('images/contactos.jpg') }}">
        <div class="has-text-centered is-item">
            <h2 class="title is-colored-white">Veja todos os Contactos!</h2>
            <a href="{{ route('contacts.index') }}" class="button is-primary is-large">Contactos</a>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
