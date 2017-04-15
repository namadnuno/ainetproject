@extends('layouts.admin')

@section('content-child')
    <div class="columns">
        <div class="column is-3">
            <div class="box">
                <div class="card-image">
                    <figure class="image">
                        @if (auth()->user()->profile_photo)
                            <img src="{{ asset(auth()->user()->profile_photo) }}" class="is-circle">
                        @else
                            <img src="http://bulma.io/images/placeholders/128x128.png" class="is-circle">
                        @endif
                    </figure>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="box">
                <div class="media-content">
                    <div class="content">
                        <p ><strong>{{ auth()->user()->name }}</strong> <small>{{ auth()->user()->email }}</small> </p>
                        <p>
                            {{ auth()->user()->presentation }}
                        </p>
                    </div>
                </div>
                <nav class="level is-mobile">
                    <div class="level-left">
                        <a class="level-item">
                            <span class="icon is-small">
                                <i class="fa fa-phone"></i>
                            </span>
                            {{ auth()->user()->phone ? auth()->user()->phone : 'Não Dado' }}
                        </a>
                        <a class="level-item">
                            <span class="icon is-small">
                                <i class="fa fa-link"></i>
                            </span>
                            {{ auth()->user()->phone ? auth()->user()->profile_url : 'Não Dado' }}
                        </a>
                        <a class="level-item">
                            <span class="icon is-small">
                                <i class="fa fa-building-o"></i>
                            </span>
                            {{ auth()->user()->departament->name }}
                        </a>
                    </div>
                    <div class="level-right">
                        <a href="{{ route('perfil.edit') }}" class="level-item button is-info">
                            Editar
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

@stop


@section('title')
Perfil
@stop
