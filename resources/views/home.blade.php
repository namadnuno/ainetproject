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
                <h2 class="title is-2 is-inline">Departamentos</h2> <h4 class="is-small is-4 is-inline">{{ $departments->count() }}</h4>
                <div class="content">
                    <div class="columns is-multiline ">

                    @foreach($departments as $department)
                        <div class="column is-half">
                            <div class="box">
                                <article class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <h5 class="title is-5"> 
                                                <span class="icon"><i class="fa fa-building-o"></i></span>
                                                {{ $department->name }}
                                            </h5>
                                        </div>
                                    </div>
                                </article>
                                <div class="columns">
                                    <div class="column is-one-quarter">
                                        <span class="tag is-info">{{ $department->requests()->done()->count() }} Impreções</span>
                                    </div>
                                    <div class="column is-one-quarter">
                                       <span class="tag is-dark">{{ $department->requests()->done()->blackAndWhite()->count() }} Impreções</span>
                                    </div>
                                    <div class="column is-one-quarter">
                                         <span class="tag is-success">{{ $department->requests()->done()->colored()->count() }} Impreções</span>
                                    </div>
                                    <div class="column is-one-quarter">
                                         <span class="tag is-primary">{{ $department->users()->count() }} Funcionários</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                @include('partials.pagination', ['pagination' => $departments])
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
