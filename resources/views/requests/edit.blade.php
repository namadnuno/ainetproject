@extends('layouts.admin')

@section('content-child')
    @include('requests.refuse-box')
    @include('requests.admin-controls')
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