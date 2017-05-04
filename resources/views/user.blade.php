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
	                <div class="media-content">
	                    <div class="content">
	                        <p ><strong>{{ $user->name }}</strong> <small>{{ $user->email }}</small> </p>
	                        <p>
	                            {{ $user->presentation }}
	                        </p>
	                    </div>
	                </div>
	                <nav class="level is-mobile">
	                    <div class="level-left">
	                        <a class="level-item">
	                            <span class="icon is-small">
	                                <i class="fa fa-phone"></i>
	                            </span>
	                            {{ $user->phone ? $user->phone : 'Não Dado' }}
	                        </a>
	                        <a class="level-item">
	                            <span class="icon is-small">
	                                <i class="fa fa-link"></i>
	                            </span>
	                            {{ $user->phone ? $user->profile_url : 'Não Dado' }}
	                        </a>
	                        <a class="level-item">
	                            <span class="icon is-small">
	                                <i class="fa fa-building-o"></i>
	                            </span>
	                            {{ $user->departament->name }}
	                        </a>
	                    </div>
	                    @unless(auth()->check() && auth()->user()->isAdmin())
	                    <div class="level-right">
	                        <form action="{{ route('user.change') }}" method="post" >
	                        	{{ csrf_field() }}
	                        	{{ method_field('PUT') }}
	                            <input type="hidden" value="{{ $user->id }}" name="user_id">
								<button 
								class="level-item button {{ $user->blocked == 1 ? 'is-success' : 'is-danger' }}" type="submit">
									{{ $user->blocked == 1 ? 'Desbloquear' : 'Bloquear' }}
								</button>
	                        </form>
	                    </div>
	                    @endunless
	                </nav>
	            </div>
	        </div>
	    </div>
    </div>
@stop
