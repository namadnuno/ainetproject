@extends('layouts.main')

@section('content')
@include('partials.section-header',
	[
	'title' => 'Lista de contactos',
	'subtitle' => ''
	]);
	<div class="container is-top-medium is-bottom-medium">
		@include('partials.filter-box', [
			'filters' => [
			'created_at' => 'Data de Criação',
			'name' => 'Nome',
			'email' => 'Email'
			],
			'newRoute' => ''
			])
			<div class="columns  is-multiline">
				@foreach ($users as $user)
				<div class="column is-one-quarter">
					<div class="box">
						<div class="media-content">
							<figure class="image is-square">
								@include('partials.profile_photo_of', $user)
							</figure>
						</div>
						<div class="card-content">
							<div class="media-content">
								<p class="tile is-6 has-text-centered">
									<strong>{{ $user->name }}</strong> <br>
								</p>
								<p class="subtitle is-6">
									{{ $user->email }} <br>
									{{ $user->phone }}
								</p>
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
		</div>
		@stop

@section('scripts')
	<script src="{{ asset('js/home.js') }}"></script>
@stop