@extends('layouts.admin')

@section('content-child')
    <div class="box">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <b>Como administrador pode:</b>
                </div>
                <div class="level-right">
                    <a href="{{ route('requests.refuse', $request->id) }}" type="submit" class="level-item button is-warning">
                        <span class="icon is-small">
                            <i class="fa fa-ban"></i>
                        </span>
                        <span>
                            Recusar
                        </span>
                    </a>
                    <button class="level-item button is-success">
                        <span class="icon is-small">
                            <i class="fa fa-check"></i>
                        </span>
                        <span>
                            Concluir
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="media-content">
            <form action="{{ route('requests.update', $request->id) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @include('requests.form')
                
            </form>
        </div>
    </div>
@endsection

@section('title')
    Editar Pedido #{{ $request->id }}
@endsection