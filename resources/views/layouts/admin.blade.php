@extends('layouts.main')

@section('content')
<section class="hero is-medium is-primary is-bold">
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
						{{ request()->is('dashboard') ? 'class=is-active' : '' }}
						>Painel de Administração</a>
					</li>
					<li>
						<a href="{{ route('perfil.index') }}"
						{{ request()->is('perfil') ? 'class=is-active' : '' }}
						>Meu Perfil</a>
					</li>
				</ul>
				<p class="menu-label">
					Administração de Pedidos
				</p>
				<ul class="menu-list">
					<li><a>Utilizadores</a></li>
					<li><a>Pedidos de Impressão</a></li>
					<li><a>Comentários</a></li>
				</ul>
				<p class="menu-label">
					Pedidos
				</p>
				<ul class="menu-list">
					<li><a>Meus Pedidos</a></li>
					<li><a>Criar</a></li>
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
	    ]) !!};
	</script>
	<script src="{{ asset('js/app.js') }}" ></script>
@stop