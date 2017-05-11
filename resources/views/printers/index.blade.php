@extends('layouts.admin')

@section('title', 'Impressoras')

@section('content-child')
    @include('partials.messages')
    @include('partials.filter-box', [
        'filters' => [
            'created_at' => 'Data de Criação',
        ],
        'newRoute' =>
            'printers.create'
        ])
    <div class="columns  is-multiline">
        @foreach ($printers as $printer)
            <div class="column is-one-quarter">
                <div class="card">
                    <h3 class="is-title is-3">{{ $printer->name }}</h3>
                </div>
            </div>
        @endforeach
    </div>
@endsection