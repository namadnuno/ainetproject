@extends('layouts.admin')

@section('content-child')
	<form class="form" action="{{ route('perfil.update') }}" 
	method="PUT" enctype="multipart/form-data">
		{{ method_field('PUT') }}
		<div class="field">
			<label class="label">Nome</label>
		 	<p class="control">
				<input class="input" type="text" placeholder="Nome" name="nome">
		 	</p>
		</div>
		<div class="field">
			<label class="label">Email</label>
		 	<p class="control">
				<input class="input" type="text" placeholder="Email" name="email">
		 	</p>
		</div>
		<div class="field">
			<label class="label">Password</label>
		 	<p class="control">
				<input class="input" type="password" placeholder="Password" name="password">
		 	</p>
		</div>
		<div class="field">
			<label class="label">Password</label>
		 	<p class="control">
				<input class="input" type="password" placeholder="Confirmação da Password" name="password_confirmation">
		 	</p>
		</div>
		<div class="field">
			<label class="label">Telemovel</label>
		 	<p class="control">
				<input class="input" type="number" min="100000000" max="999999999" placeholder="Telemovel" name="telemovel">
		 	</p>
		</div>
		<div class="field">
			<label class="label">Perfil (Ligação)</label>
		 	<p class="control">
				<input class="input" type="text" placeholder="ex: twitter/..." name="profile_url">
		 	</p>
		</div>
		<div class="field">
			<label class="label">Apresentação</label>
		 	<p class="control">
				<textarea class="textarea" name="presentation" placeholder="Apresentação"></textarea>
			</p>
		</div>
		<div class="field">
			<label class="label">Fotografia</label>
		 	<p class="control">
				<input class="input" type="file" name="profile_photo">
		 	</p>
		</div>
		<div class="has-text-right">
    		<button class=" button is-primary">Enviar</button>
  		</div>
	</form>
@stop

@section('title')
	Editar o seu perfil
@stop