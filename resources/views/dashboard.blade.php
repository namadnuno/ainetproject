@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="card">
			<h1 class="is-title">Olá, {{ auth()->user()->name }}</h1>
		</div>
	</div>
@stop