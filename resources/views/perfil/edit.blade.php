@extends('layouts.admin')

@section('content-child')
	@include('partials.messages')
	<div class="box">
		<form class="form" action="{{ route('perfil.update') }}"
		method="POST" enctype="multipart/form-data">
			@include('partials.errors')
			@include('perfil.form')
			<div class="has-text-right">
				<button class=" button is-danger">Voltar</button>
	    		<button class=" button is-success">Enviar</button>
	  		</div>
		</form>
	</div>
@stop

@section('title')
	Editar o seu perfil
@stop
