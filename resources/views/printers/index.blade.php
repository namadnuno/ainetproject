@extends('layouts.admin')

@section('title', 'Impressoras')

@section('content-child')
    @include('partials.messages')
    @include('partials.filter-box', [
        'filters' => [
            'created_at' => 'Data de Criação',
            'open_date' => 'Data Abertura',
            'quantity' => 'Quantidade',
            'paper_size' => 'Tamanho de Papel',
            'status' => 'Estado',
        ],
        'newRoute' =>
            'requests.create'
        ])
    <div class="columns  is-multiline">
        @foreach ($printers as $printer)
            <div class="column is-one-quarter">
                <div class="card">
                </div>
            </div>
        @endforeach
    </div>
@endsection