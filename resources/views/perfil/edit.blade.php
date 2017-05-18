@extends('layouts.admin')

@section('content-child')
	@include('partials.messages')
	<div class="box">
		<form class="form" action="{{ route('perfil.update') }}"
		method="POST" enctype="multipart/form-data">
			{{ method_field('PUT') }}
			@include('partials.errors')
			@include('perfil.form')
			<div class="has-text-right">
				<a href="{{ url()->previous() }}" class=" button is-primary">Voltar</a>
	    		<button class=" button is-success">Enviar</button>
	  		</div>
		</form>
	</div>
@stop

@section('title')
	Editar o seu perfil
@stop
