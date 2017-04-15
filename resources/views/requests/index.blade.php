@extends('layouts.admin')

@section('content-child')
    @include('partials.messages')
    <div class="box">
    <!-- Main container -->
        <nav class="level">
            <!-- Left side -->
            <div class="level-left">
                <div class="level-item">
                    <div class="field has-addons">
                        <p class="control">
                            <input class="input" type="text" placeholder="Procurar por pedido" name="filter">
                        </p>
                        <p class="control">
                            <button class="button">
                                Search
                            </button>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right side -->
            <div class="level-right">
                <p class="level-item"><strong>Ordernar por:</strong></p>
                <p class="level-item">
                    <div class="field is-marginless">
                        <p class="control">
                            <span class="select" name="order">
                                <select>
                                    <option value="created_date">Data Criação</option>
                                    <option value="quantity">Quantidade</option>
                                    <option value="paper_size">Tamanho de Papel</option>
                                    <option value="status">Estado</option>
                                </select>
                            </span>
                        </p>
                    </div>
                </p>
                <p class="level-item"><a></a></p>
                <p class="level-item"><a class="button is-info">Filtar</a></p>
                <p class="level-item">
                    <a class="button is-success" href="{{ route('requests.new') }}">Novo</a></p>
                </div>
            </nav>
        </div>
        <div class="columns  is-multiline">
            @foreach ($requests as $request)
                <div class="column is-one-quarter">
                    <div class="card">
                        @if(pathinfo(asset($request->file))['extension'] == 'jpg' ||
                        pathinfo(asset($request->file))['extension'] == 'png' ||
                        pathinfo(asset($request->file))['extension'] == 'tiff')
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{asset($request->file)}}" alt="">
                                </figure>
                            </div>
                        @endif
                        <div class="card-content">
                            <div class="content">
                                <span class="tag is-dark">{{ pathinfo(asset($request->file))['extension'] }}</span>
                                <strong class="timestamp">{{ \Carbon\Carbon::parse($request->open_date)->diffForHumans() }}</strong>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a class="card-footer-item">Ver</a>
                            <a class="card-footer-item">Editar</a>
                            <a class="card-footer-item">Remover</a>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection

    @section('title')
        Meus Pedidos
    @endsection
