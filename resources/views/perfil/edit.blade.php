@extends('layouts.admin')

@section('content-child')
	<div class="box">
		<form class="form" action="{{ route('perfil.update') }}"
		method="POST" enctype="multipart/form-data">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			@include('partials.errors')

			<div class="field">
				<label class="label">Nome</label>
			 	<p class="control">
					<input class="input" type="text" placeholder="Nome" name="name"
					value="{{ old('name') ? old('name') : auth()->user()->name }}">
			 	</p>
			</div>
			<div class="field">
				<label class="label">Email</label>
			 	<p class="control">
					<input class="input" type="text" placeholder="Email" name="email"
					value="{{ old('email') ? old('email') : auth()->user()->email }}">
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
					<input class="input" type="number" min="100000000" max="999999999" placeholder="Telemovel" name="phone"
					value="{{ old('phone') ? old('phone') : auth()->user()->phone }}">
			 	</p>
			</div>
			<div class="field">
				<label class="label">Perfil (Ligação)</label>
			 	<p class="control">
					<input class="input" type="text" placeholder="ex: twitter/..." name="profile_url"
					value="{{ old('profile_url') ? old('profile_url') : auth()->user()->profile_url }}">
			 	</p>
			</div>
			<div class="field">
				<label class="label">Apresentação</label>
			 	<p class="control">
					<textarea class="textarea" name="presentation" placeholder="Apresentação">{{ old('presentation') ? old('presentation') : auth()->user()->presentation }}</textarea>
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
	</div>
@stop

@section('title')
	Editar o seu perfil
@stop
