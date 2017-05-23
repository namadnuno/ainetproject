@extends('layouts.main')

@section('content')
        <div id="hero" style="background-image: url({{ asset('images/hero.jpg') }})">
            <div class="container">
                <div class="heading">
                    <h1><span>Print</span>IT</h1>
                </div>
                <div class="print-number">
                    {{ $pedidos->count() }}
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
            <div class="container">
                <div class="columns">
                    <div class="column has-text-centered">
                        <div class="number-of-printes">
                            <h3 class="title is-3">{{ $pedidos->colored()->count() }}</h3>
                            <h4 class="subtitle is-4">Cores</h4>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div class="number-of-printes">
                            <h3 class="title is-3">{{ $pedidos->blackAndWhite()->count() }}</h3>
                            <h4 class="subtitle is-4">Preto & branco</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="departamentos">
            <div class="container">
                <h2 class="title is-2 has-text-centered">Departamentos</h2>
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
                                        <span class="tag is-info">{{ $department->requests_count}} Impreções</span>
                                    </div>
                                    <div class="column is-one-quarter">
                                       <span class="tag is-dark">{{ $department->requests()->blackAndWhite()->count() }} Impreções</span>
                                    </div>
                                    <div class="column is-one-quarter">
                                         <span class="tag is-success">{{ $department->requests()->colored()->count() }} Impreções</span>
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
            </div>
        </section>

        <section id="status">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <div class="number-of-printes has-text-centered">
                            <h3 class="title is-3">{{ $pedidos->done()->ofToday()->count() }}</h3>
                            <h4 class="subtitle is-4">Hoje</h4>
                        </div>
                    </div>
                    <div class="column">
                        <div class="number-of-printes has-text-centered">
                            <h3 class="title is-3">{{ $pedidos->done()->ofMonth()->count() }}</h3>
                            <h4 class="subtitle is-4">Mês</h4>
                        </div>
                    </div>
                    <div class="column">
                        <div class="number-of-printes has-text-centered">
                            <h3 class="title is-3">
                                {{
                                    $pedidos->done()->ofMonth()->count() /
                                    cal_days_in_month(CAL_GREGORIAN,
                                        Carbon\Carbon::now()->month,
                                        Carbon\Carbon::now()->year
                                    )
                                }}
                            </h3>
                            <h4 class="subtitle is-4">Média</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @stop
