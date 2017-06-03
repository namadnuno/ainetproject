@extends('layouts.admin')

@section('content-child')
    @include('partials.messages')
    @include('partials.filter-box', [
        'filters' => [
        'created_at' => 'Data de Criação',
        'due_date' => 'Data Fidelização',
        'quantity' => 'Quantidade',
        'paper_size' => 'Tamanho de Papel',
        'status' => 'Estado',
        'owner_id' => 'Nome de Funcionário'
        ],
        'newRoute' =>
        'requests.create'
        ])

    <div class="columns is-multiline">
        @foreach ($requests as $request)
            <div class="column is-one-quarter">
                <div class="card">
                    <header class="card-header">
                        <div class="card-header-title" >
                            <a href="{{ route('users.show', $request->user) }}">{{ $request->user->name }}</a>
                        </div>
                    </header>
                    <div class="card-image">
                        <figure class="image is-square">
                            @if(isImage($request))
                                <img src="{{ route('getFile', $request) }}" alt="pedido" />
                            @else
                                <img src="{{ asset('/files_formats/' . typeFile($request) . '.png')}}" alt="" />
                            @endif
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <div class="is-bottom-xsmall">
                                <b>Departamento: </b><a href="{{ route('departments.show', $request->user->departament ) }}" >{{ $request->user->departament->name}}</a>
                            </div>
                            <div class="columns">
                                <div class="column is-one-third">
                                <span class="tag is-{{ $request->colored == 1 ? 'primary' : 'dark'}}">
                                    <span class="icon is-small">
                                        <i class="fa fa-{{ typeFile($request) }}"></i>
                                    </span>
                                </span>
                                </div>
                                <div class="column is-one-third">
                                    @if ($request->status == 0)
                                        <span class="tag is-danger">
                                    <span class="icon is-small">
                                        <i class="fa fa-ban"></i>
                                    </span>
                                </span>
                                    @elseif($request->status == 1)
                                        <span class="tag is-warning">
                                    <span class="icon is-small">
                                        <i class="fa fa-exclamation"></i>
                                    </span>
                                </span>
                                    @else
                                        <span class="tag is-success">
                                    <span class="icon is-small">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </span>
                                    @endif
                                </div>
                                <div class="column is-one-third">
                                 <span class="tag is-info">
                                     <span class="icon is-small">
                                         <i class="fa fa-print"> {{ $request->quantity }}</i>
                                     </span>
                                 </span>
                                </div>
                            </div>

                            @if($request->status == 2)
                                <div class="has-text-centered">
                            <span class="icon is-small">
                                @for ($i = 0; $i < $request->satisfaction_grade; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </span>
                                </div>
                            @endif
                            <div class="has-text-centered">
                                <strong class="timestamp">{{ $request->created_at->diffForHumans() }}</strong>
                            </div>
                        </div>
                    </div>

                    <footer class="card-footer">
                        @can('show', $request)
                            <a href="{{ route('requests.show', $request->id) }}" class="card-footer-item">Ver</a>
                        @endcan
                        @if($request->status != 2)
                            @can('update', $request)
                                <a href="{{ route('requests.edit', $request->id) }}" class="card-footer-item">Editar</a>
                            @endcan
                            @can('delete', $request)
                                <remover-objeto route="{{ route('requests.destroy', $request) }}" token="{{ csrf_token() }}" >
                                    Tem a certeza que quer remover o pedido ?
                                </remover-objeto>
                            @endcan
                        @else
                            @if($request->isDone())
                                <a href="{{ route('request.report', $request) }}" class="card-footer-item">Relatório</a>
                            @else
                                @can('evaluate', $request)
                                    <evaluate-pedido route="{{ route('requests.evaluate', $request) }}" token="{{ csrf_token() }}"></evaluate-pedido>
                                @endcan
                            @endif
                        @endif
                    </footer>
                </div>
            </div>
        @endforeach
    </div>

    <div class="box">
        <div class="columns">
            <div class="column is-4">
                <span class="tag is-dark">
                    <span class="icon is-small">
                        <i class="fa fa-file-photo-o"></i>
                    </span>
                </span>
                Impressão a Preto e Branco
            </div>
            <div class="column is-4">
                <span class="tag is-primary">
                    <span class="icon is-small">
                        <i class="fa fa-file-photo-o"></i>
                    </span>
                </span>
                Impressão a Cores
            </div>
            <div class="column is-4">
                <span class="tag is-info">
                    <span class="icon is-small">
                        <i class="fa fa-print"></i>
                    </span>
                </span>
                Quantidade de mpressões
            </div>
        </div>
        <div class="columns">
            <div class="column is-4">
                <span class="tag is-danger">
                    <span class="icon is-small">
                        <i class="fa fa-ban"></i>
                    </span>
                </span>
                Pedido recusado
            </div>
            <div class="column is-4">
                <span class="tag is-warning">
                    <span class="icon is-small">
                        <i class="fa fa-exclamation"></i>
                    </span>
                </span>
                Pedido pendente
            </div>
            <div class="column is-4">
                <span class="tag is-success">
                    <span class="icon is-small">
                        <i class="fa fa-check"></i>
                    </span>
                </span>
                Pedido concluído
            </div>
        </div>
    </div>

    @include('partials.pagination', ['pagination' => $requests])
@endsection

@section('title')
    Meus Pedidos
@endsection



