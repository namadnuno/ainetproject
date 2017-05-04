@extends('layouts.admin')

@section('content-child')
	@include('partials.messages')
	<div class="box">
		<form class="form" action="{{ route('perfil.storeAsAdmin') }}"
		method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			@include('partials.errors')
			@include('perfil.form')
			<div class="has-text-right">
	    		<button class=" button is-primary">Enviar</button>
	  		</div>
		</form>
	</div>
@stop

@section('title')
	Novo Perfil
@stop
