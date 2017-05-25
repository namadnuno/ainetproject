@extends('layouts.admin')

@section('title', 'Departamentos')

@section('content-child')
    @include('partials.messages')
    @include('partials.filter-box', [
        'filters' => [
            'created_at' => 'Data de Criação',
        ],
        'newRoute' =>
            'departments.create'
        ])
    <div class="columns  is-multiline">
        @foreach ($departments as $department)
            <div class="column is-one-quarter">
                <div class="card">
                    <div class="card-content">
                        <div class="content has-text-centered">
                            <h3 class="is-title ">{{ $department->name }}</h3>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('departments.edit', $department) }}" class="card-footer-item">Editar</a>
                        <a href="{{ route('departments.destroy', $department) }}" class="card-footer-item">Remover</a>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>
    @include('partials.pagination', ['pagination' => $departments])
@endsection