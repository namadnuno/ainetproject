@extends('layouts.main')


@section('content')
<section class="hero is-small is-primary is-bold">
	<div class="hero-body">
		<div class="container">
			<h1 class="title">
				@yield('title')
			</h1>
			<h2 class="subtitle">
				Olá, <b>{{ auth()->user()->name }}</b>
			</h2>
		</div>
	</div>
</section>
<section class="container is-top-large is-bottom-large">
	<div class="columns">
		<div class="column is-one-quarter">
			<aside class="menu">
				<p class="menu-label">
					Geral
				</p>
				<ul class="menu-list">
					<li>
						<a href="{{ route('dashboard') }}"
						@isActive('dashboard')
						>Painel de Administração</a>
					</li>
					<li>
						<a href="{{ route('perfil.index') }}"
						@isActive('perfil.index')
						>Meu Perfil</a>
					</li>
				</ul>
				@if(auth()->user()->isAdmin())
					<p class="menu-label">
						Administração de Pedidos
					</p>
					<ul class="menu-list">
						<li>
							<a href="{{ route('users.index') }}"
							   @isActive('users.index')
							>
								Utilizadores
							</a>
						</li>
						<li>
							<a href="{{ route('departments.index') }}"
							   @isActive('departments.index')
							>
								Departamentos
							</a>
						</li>
						<li><a>Pedidos de Impressão</a></li>
						<li>
							<a href="{{ route('comments.index') }}"
							   @isActive('comments.index')>
								Comentários
							</a>
						</li>
						<li>
							<a href="{{ route('printers.index') }}"
									@isActive('printers.index')>
								Impressoras
							</a>
						</li>
					</ul>
				@endif
				<p class="menu-label">
					Pedidos
				</p>
				<ul class="menu-list">
					<li>
						<a href="{{ route('requests.index') }}"
						   @isActive('requests.index')>Meus Pedidos</a>
					</li>
					<li>
						<a href="{{ route('requests.create') }}"
						   @isActive('requests.create')>Criar</a>
					</li>
				</ul>
			</aside>
		</div>
		<div class="column">
			<div id="app">
				@yield('content-child')
			</div>
		</div>
	</div>
</section>
@stop

@section('scripts')
	<script type="text/javascript">
		 window.Laravel = {!! json_encode([
	        'csrfToken' => csrf_token(),
	        'authToken' => auth()->user()->createToken('My Token')->accessToken
	    ]) !!};
		var _api = "{{ url('/') }}"; 
	</script>
	<script src="{{ asset('js/app.js') }}" ></script>
@stop
