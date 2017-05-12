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
                    <div class="card-content">
                        <div class="content has-text-centered">
                            <h3 class="is-title ">{{ $printer->name }}</h3>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('printers.edit', $printer) }}" class="card-footer-item">Editar</a>
                        <a href="{{ route('printers.destroy', $printer) }}" class="card-footer-item">Remover</a>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>
@endsection