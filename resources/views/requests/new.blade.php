@extends('layouts.admin')

@section('content-child')
    <div class="box">
        <div class="media-content">
            <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data">
                @include('requests.form')
            </form>
        </div>
    </div>

@endsection

@section('title')
    Novo Pedido
@endsection