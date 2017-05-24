@extends('layouts.admin')

@section('content-child')
@include('partials.messages')
@include('partials.filter-box', [
	'filters' => [
		'created_at' => 'Data de Criação',
		'name' => 'Nome',
		'email' => 'Email',
		'blocked' => 'Bloqueados'
	],
	'newRoute' =>
		'users.create'
])
<div class="columns  is-multiline">
	@foreach ($users as $user)
	<div class="column is-one-third">
		<div class="box">
			<div class="media-content">
				<figure class="image is-square">
					@include('partials.profile_photo_of', $user)
				</figure>
			</div>
			<div class="card-content">
				<div class="content">
					<p class="has-text-centered">
						<strong>{{ $user->name }}</strong> <br>
						{{ $user->email }}
					</p>
					<div class="level">
						<div class="level-left">
							<div class="level-item">
								@if ($user->blocked == '1')
									<span class="tag is-danger">Bloqueado</span>
								@endif
								<span class="tag is-dark">
									{{ $user->admin == 1 ? 'Administrador' : 'Funcionário' }}
								</span>
							</div>
						</div>
						<div class="level-right">
							<span class="tag is-info">
								{{ $user->requests->count() }} Pedidos
							</span>
						</div>
					</div>
					<div class="has-text-centered">
						<strong class="timestamp">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</strong>
					</div>
				</div>
			</div>
			<footer class="card-footer">
				<a href="{{ route('users.show', $user->id) }}" class="card-footer-item">Ver</a>
			</footer>
		</div>
	</div>
	@endforeach
</div>
@include('partials.pagination', ['pagination' => $users])
@stop

@section('title')
Utilizadores
@stop