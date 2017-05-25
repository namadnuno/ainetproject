@extends('layouts.admin')

@section('title', 'Nova Impressora')

@section('content-child')
    <div class="box">
        <div class="media-content">
            <form action="{{ route('departments.store') }}" method="POST">
                @include('partials.errors')
                @include('departments.form')
                <div class="has-text-right">
                    <button class=" button is-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection