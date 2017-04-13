@extends('layouts.admin')

@section('content-child')
<div class="card">
    <div class="card-content">
        <div class="media">
            <div class="media-left">
                <figure class="image image is-128x128">
                    <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
                </figure>
            </div>
            <div class="media-content">
                <p class="title is-4">{{ auth()->user()->name }}</p>
                <p class="subtitle is-6">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <div class="content">
          {{ auth()->user()->presentation }}
          <nav class="level is-mobile">
            <div class="level-left">
                <a class="level-item">
                <span class="is-small">
                    <span class="icon">
                        <i class="fa fa-phone"></i>
                    </span> 
                    {{ auth()->user()->phone ? auth()->user()->phone : 'Não Dado' }} 
                </span>
                </a>
                <a class="level-item">
                    <span class="is-small">
                        <span class="icon">
                            <i class="fa fa-link"></i>
                        </span>  
                        {{ auth()->user()->phone ? auth()->user()->profile_url : 'Não Dado' }} 
                    </span>
                </a>
                <a class="level-item">
                    <span class="is-small">
                        <span class="icon">
                            <i class="fa fa-building-o"></i>
                        </span>  
                        {{ auth()->user()->departament->name }}
                    </span>
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