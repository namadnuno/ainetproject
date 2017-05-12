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
            </div>
        </div>
        <div class="column">
            <div class="box">

                @include('perfil.helper')
                
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
