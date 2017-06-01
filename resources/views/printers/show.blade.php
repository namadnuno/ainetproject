@extends('layouts.admin')

@section('title', "Impressora $printer->name")

@section('content-child')
    <div class="is-top-medium is-bottom-medium" id="content">
        <div class="columns">
            <div class="column is-6">
                <printer-requests-types :printer="{{ $printer }}"></printer-requests-types>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-header">
                        <p class="card-header-title">
                            Dados
                        </p>
                    </div>
                    <div class="card-content">
                        <table class="table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    Nome:
                                </td>
                                <td>
                                    {{ $printer->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Numero de Pedidos Concluidos:
                                </td>
                                <td>
                                    {{ $printer->requests()->done()->count() }} / {{ $printer->requests()->count() }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Numero de Pedidos Cores:
                                </td>
                                <td>
                                    {{ $printer->requests()->colored()->done()->count() }} / {{ $printer->requests()->colored()->count() }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Numero de Pedidos Preto e Branco:
                                </td>
                                <td>
                                    {{ $printer->requests()->blackAndWhite()->done()->count() }} / {{ $printer->requests()->blackAndWhite()->count() }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">
                    Pedidos
                </p>
            </div>
            <div class="card-content">
                <div class="columns">
                    @foreach($requests as $request)
                        <div class="column is-3">
                            <div class="columns">
                                <div class="column is-3 is-marginless">
                                    <div class="image">
                                        <a href="{{ route('users.show', $request->user) }}">
                                            @include('partials.profile_photo_of', ['user' => $request->user ])
                                        </a>
                                    </div>
                                </div>
                                <div class="column is-9">
                                    <p class="is-small">
                                        <small>Fez o pedido a {{ $request->created_at->toDateString() }}</small>
                                        <small>
                                            @if($request->isRecusado())
                                                Recusado
                                            @elseif($request->isDone())
                                                Concluido
                                            @else
                                                Pendente
                                            @endif
                                        </small>
                                        <br>
                                        <a class="button is-info is-small" href="{{ route('requests.show', $request) }}">Ver</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop