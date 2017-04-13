@extends('layouts.main')

@section('content')
        <div id="hero" style="background-image: url({{ asset('images/hero.jpg') }})">
            <div class="container">
                <div class="heading">
                    <h1><span>Print</span>IT</h1>
                </div>
                <div class="print-number">
                    11111111
                    <span>Impressões</span>
                </div>
                <div class="cta-account">
                       <a class="button is-primary is-large" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
        <section id="fight">
            <div class="container">
                <div class="columns">
                    <div class="column has-text-centered">
                        <div class="number-of-printes">
                            <h3 class="title is-3">8393</h3> 
                            <h4 class="subtitle is-4">Cores</h4>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div class="number-of-printes">
                            <h3 class="title is-3">23213</h3> 
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
                    <div class="columns">
                    @foreach(App\Departament::all() as $department)
                        <div class="column">
                            <div class="box">
                                <article class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <h5 class="title is-5">{{ $department->name }}</h5>
                                        </div>
                                    </div>
                                </article>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                      <div class="level-item">
                                        <span class="tag is-info">{{ $department->numTotalOfPrints() }} Impreções</span>
                                      </div>
                                    </div>
                                </nav>
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
                            <h3 class="title is-3">15</h3> 
                            <h4 class="subtitle is-4">Hoje</h4>
                        </div>
                    </div>
                    <div class="column">
                        <div class="number-of-printes has-text-centered">
                            <h3 class="title is-3">232</h3> 
                            <h4 class="subtitle is-4">Mês</h4>
                        </div>
                    </div>
                    <div class="column">
                        <div class="number-of-printes has-text-centered">
                            <h3 class="title is-3">3.5</h3> 
                            <h4 class="subtitle is-4">Média</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @stop
