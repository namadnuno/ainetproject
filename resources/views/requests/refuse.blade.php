@extends('layouts.admin')

@section('content-child')
    <div class="box">
        <div class="media-content">
            <form action="{{ route('requests.refused', $request) }}" method="POST" enctype="multipart/form-data">
                @include('partials.errors')
                {{ csrf_field() }}
                <div class="field">
                    <label for="printer_id">Razão</label>
                    <p class="control">
                        <textarea class="textarea" placeholder="Razão" name="refused_reason"></textarea>
                    </p>
                </div>
                <div class="has-text-right">
                    <button type="submit" class="button is-success">Recusar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('title')
    Concluir pedido Pedido #{{ $request->id }}
@endsection