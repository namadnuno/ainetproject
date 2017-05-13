@extends('layouts.main')

@section('content')
	@include('partials.section-header', 
	[
	    'title' => 'Perfil de '. $user->name,
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
	                <div class="media-content">
	                    <div class="content">
	                        <p ><strong>{{ $user->name }}</strong></p>
	                        <p>{{ $user->presentation }}</p>
	                    </div>
	                </div>
	                <div class="columns">
	                    <div class="column is-half">
	                        <a class="has-text-left">
	                            <span class="icon">
	                                <i class="fa fa-phone"></i>
	                            </span>
		                            {{ $user->phone ? $user->phone : 'Não há contacto' }}
		                    </a>
	                    </div>
	                    <div class="column is-half">
	                        <a class="has-text-lef">
	                            <span class="icon">
	                                <i class="fa fa-link"></i>
	                            </span>
		                            {{ $user->phone ? $user->profile_url : 'Não há ligação para um perfil externo' }}
		                    </a>
	                    </div>
                	</div>

                	<div class="columns">
                    	<div class="column is-half">
                        	<a class="has-text-left">
                            	<span class="icon">
                                	<i class="fa fa-envelope"></i>
                            	</span>
	                            	{{ $user->phone ? $user->phone : 'Não há email' }}
	                        </a>
                    	</div>
                    	<div class="column is-half">
                        	<a class="has-text-left">
                            	<span class="icon">
                             	   <i class="fa fa-building-o"></i>
                            	</span>
								{{ $user->departament->name }}
                            </a>
                    	</div>
                	</div>
                	<div class="level-left">
	                	<a href="{{ url()->previous() }}" class="level-item button is-primary">Voltar</a>
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