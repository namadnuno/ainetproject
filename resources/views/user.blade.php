@extends('layouts.main')

@section('content')
	@include('partials.section-header', 
	[
	    'title' => 'Perfil do '. $user->name,
	    'subtitle' => ''
	]);	
	<div class="container">	
		@include('partials.messages')
		<div class="columns">
	        <div class="column is-3">
	            <div class="box">
	                <div class="media-content">
	                    <figure class="image">
	                        @include('partials.profile_photo_of', $user)
	                    </figure>
	                </div>
	            </div>
	        </div>

	        <div class="column">
	            <div class="box">
	            
	                @include('perfil.helper')

	                <div class="level-left">
	                	<a class="level-item button is-primary">Voltar</a>
                    	@unless(auth()->check() && auth()->user()->isAdmin())
                        <form action="{{ route('user.change') }}" method="post" >
                        	{{ csrf_field() }}
                        	{{ method_field('PUT') }}
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
							<button class="level-item button {{ $user->blocked == 1 ? 'is-success' : 'is-danger' }}" type="submit">
								{{ $user->blocked == 1 ? 'Desbloquear' : 'Bloquear' }}
							</button>
                        </form>
                    	@endunless
	                	
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
@stop
