@extends('layouts.admin')

@section('content-child')
    @include('partials.messages')
    <div class="columns">
        <div class="column is-3">
            <div class="box">
                <div class="card-image">
                    <figure class="image">
                        @include('partials.profile_photo')
                    </figure>
                </div>
                <div class="card-content">
                    <div class="has-text-centered">
                        <span class="tag is-info">
                            @if( auth()->user()->isAdmin() )
                                Administrador
                            @else
                                Funcionário
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="box">
                <div class="media-content">
                    <div class="content">
                        <p><strong>{{ auth()->user()->name }}</strong></p>
                        <p>{{ auth()->user()->presentation }}</p>
                    </div>
                </div>
                
                <div class="columns">
                    <div class="column is-half">
                        <a class="has-text-left">
                            <span class="icon">
                                <i class="fa fa-phone"></i>
                            </span>
                            {{ auth()->user()->phone ? auth()->user()->phone : 'Não há contacto' }}
                        </a>
                    </div>
                    <div class="column is-half">
                        <a class="has-text-lef">
                            <span class="icon">
                                <i class="fa fa-link"></i>
                            </span>
                            {{ auth()->user()->profile_url ? auth()->user()->profile_url : 'Não há ligação para um perfil externo' }}
                        </a>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-half">
                        <a class="has-text-left">
                            <span class="icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            {{ auth()->user()->email }}
                        </a>
                    </div>
                    <div class="column is-half">
                        <a class="has-text-left">
                            <span class="icon">
                                <i class="fa fa-building-o"></i>
                            </span>
                            {{ auth()->user()->departament->name }}
                        </a>
                    </div>
                </div>
                <nav class="level is-mobile">
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