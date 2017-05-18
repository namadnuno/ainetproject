@extends('layouts.admin')

@section('content-child')
    @if($request->isRecusado())
        <div class="notification is-warning">
            <button class="delete"></button>
            <b>Este pedido foi recusado</b><br>
            <b>Razão: </b> <i>"{{ $request->refused_reason }}"</i>
        </div>
    @endif
    <div class="box">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <b>Como administrador pode:</b>
                </div>
                <div class="level-right">
                    @if($request->isRecusado())
                        <a href="{{ route('requests.readmit', $request->id) }}" type="submit" class="level-item button is-warning">
                            <span class="icon is-small">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>
                                Readmitir
                            </span>
                        </a>
                    @else
                        <a href="{{ route('requests.refuse', $request->id) }}" type="submit" class="level-item button is-danger">
                            <span class="icon is-small">
                                <i class="fa fa-ban"></i>
                            </span>
                            <span>
                                Recusar
                            </span>
                        </a>
                        <a href="{{ route('requests.finish', $request->id) }}" type="submit" class="level-item button is-success">
                            <span class="icon is-small">
                                <i class="fa fa-check"></i>
                            </span>
                            <span>
                                Concluir
                            </span>
                        </a>   
                    @endif 
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="media-content">
            <form action="{{ route('requests.update', $request) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @include('requests.form')
            </form>
        </div>
    </div>
@endsection

@section('title')
    Editar Pedido #{{ $request->id }}
@endsection