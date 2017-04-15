@extends('layouts.admin')

@section('content-child')
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
        <div class="columns">
            @foreach ($requests as $request)
                <div class="column is-3">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="http://placehold.it/300x225" alt="">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <span class="tag is-dark">#webdev</span>
                                <strong class="timestamp">2 d</strong>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a class="card-footer-item">Save</a>
                            <a class="card-footer-item">Edit</a>
                            <a class="card-footer-item">Delete</a>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection

    @section('title')
        Meus Pedidos
    @endsection
