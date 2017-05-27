@extends('layouts.main')

@section('content')
    @include('partials.section-header', ['title' => 'Departamentos', 'subtitle' => 'Todos os departamentos registados na plataforma'])
    <div class="container is-top-medium is-bottom-medium">
        <div class="content">
            @include('partials.filter-box', [
            'filters' => [
                'created_at' => 'Data de Criação',
                'name' => 'Nome',
                'requests_count' => 'Número de pedidos',
                'users_count' => 'Número de Utilizadores',
            ],
            'newRoute' => ''])
            <div class="columns is-multiline ">
                @foreach($departments as $department)
                    <div class="column is-half">
                        <div class="box">
                            <article class="media">
                                <div class="media-content">
                                    <div  class="content">
                                        <a href="{{ route('departments.show', $department) }}">
                                            <h5 class="title is-5">
                                            <span class="icon"><i class="fa fa-building-o"></i></span>
                                            {{ $department->name }}
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <div class="columns">
                                <div class="column is-one-quarter">
                                    <span class="tag is-info">{{ $department->requests()->done()->count() }} Impressões</span>
                                </div>
                                <div class="column is-one-quarter">
                                    <span class="tag is-dark">{{ $department->requests()->done()->blackAndWhite()->count() }} Impressões</span>
                                </div>
                                <div class="column is-one-quarter">
                                    <span class="tag is-success">{{ $department->requests()->done()->colored()->count() }} Impressões</span>
                                </div>
                                <div class="column is-one-quarter">
                                    <span class="tag is-primary">{{ $department->users()->count() }} Funcionários</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @include('partials.pagination', ['pagination' => $departments])
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@stop