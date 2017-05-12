@extends('layouts.admin')

@section('content-child')
    <div class="box">
        <div class="media-content">
            <form action="{{ route('requests.done', $request) }}" method="POST" enctype="multipart/form-data">
                @include('partials.errors')
                {{ csrf_field() }}
                <div class="field">
                    <label for="printer_id">Impressora</label>
                    <p class="control">
                        <span class="select">
                            <select name="printer_id">
                                <option >Selecione a impressora</option>
                                @foreach($printers as $printer)
                                    <option value="{{ $printer->id }}">{{ $printer->name }}</option>
                                @endforeach
                            </select>
                        </span>
                    </p>
                </div>
                <div class="has-text-right">
                    <button type="submit" class="button is-success">Completar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('title')
    Concluir pedido Pedido #{{ $request->id }}
@endsection