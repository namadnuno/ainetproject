@extends('layouts.admin')

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
    @foreach ($requests as $request)
    <div class="column is-one-quarter">
        <div class="card">
            @if(pathinfo(asset($request->file))['extension'] == 'jpg' ||
                pathinfo(asset($request->file))['extension'] == 'png' ||
                pathinfo(asset($request->file))['extension'] == 'jpeg' ||
                pathinfo(asset($request->file))['extension'] == 'tiff')
                <div class="card-image">
                    <figure class="image is-square">
                        <img src="{{ asset( 'file-thumb/' .$request->file) }}" alt="">
                    </figure>
                </div>
                @else 
                <div class="card-image">
                    <figure class="image is-square">
                        <img src="{{ asset('/files_formats/' . pathinfo(asset($request->file))['extension'] . '.png' )}}" alt="">
                    </figure>
                </div>
                @endif
                <div class="card-content">
                    <div class="content">

                        <div class="columns">
                            <div class="column is-one-third">
                                <span class="tag is-dark">
                                @if(pathinfo(asset($request->file))['extension'] == 'pdf')
                                    <i class="fa fa-file-pdf-o"></i> 
                                @elseif(pathinfo(asset($request->file))['extension'] == "png" || pathinfo(asset($request->file))['extension'] == 'jpg' ||
                                    pathinfo(asset($request->file))['extension'] == 'jpeg' ||
                                    pathinfo(asset($request->file))['extension'] == 'tiff')
                                    <i class="fa fa-file-photo-o"></i>
                                @elseif(pathinfo(asset($request->file))['extension'] == "xlsx")
                                    <i class="fa fa-file-excel-o"></i>
                                @elseif(pathinfo(asset($request->file))['extension'] == "docx")
                                    <i class="fa fa-file-word-o"></i>
                                @elseif(pathinfo(asset($request->file))['extension'] == "odt")
                                    escolher icon
                                @endif
                                </span>
                            </div>

                            <div class="column is-one-third">
                                <span class="tag is-info">
                                <i class="fa fa-print">{{ $request->quantity }}</i>
                                </span>
                            </div>

                            <div class="column is-one-third">
                                @if ($request->status == 0)
                                    <span class="tag is-danger">
                                        <i class="fa fa-ban"></i>
                                    </span>
                                @elseif($request->status == 1)
                                    <span class="tag is-warning">
                                        <i class="fa fa-exclamation"></i>
                                    </span>
                                @else
                                    <span class="tag is-success">
                                        <i class="fa fa-check"></i>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="has-text-centered">
                            <strong class="timestamp">{{ \Carbon\Carbon::parse($request->created_at)->diffForHumans() }}</strong>
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="{{ route('requests.show', $request->id) }}" class="card-footer-item">Ver</a>
                    <a href="{{ route('requests.edit', $request->id) }}" class="card-footer-item">Editar</a>
                    <a class="card-footer-item">Remover</a>
                </footer>
            </div>
        </div>
        @endforeach
    </div>
    @include('partials.pagination', ['pagination' => $requests])
    @endsection

    @section('title')
    Meus Pedidos
    @endsection



    