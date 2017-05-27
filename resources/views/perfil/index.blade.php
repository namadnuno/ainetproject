@extends('layouts.admin')

@section('content-child')
    @include('partials.messages')
    <div class="profile" id="content">
        <div class="section profile-heading">
            <div class="columns">
                <div class="column is-2 has-text-centered">
                    <div class="image is-128x128 is-centered-marginally">
                        @include('partials.profile_photo_of', $user)
                    </div>
                    <p class="is-top-xsmall">
                        @if( auth()->user()->isAdmin() )
                            Administrador
                        @else
                            Funcionário
                        @endif
                    </p>
                    @if($user->profile_url)
                        <p class="is-top-xsmall">
                            <a href="{{ $user->profile_url }}" class="has-text-lef">
										<span class="icon">
											<i class="fa fa-link"></i>
										</span>
                            </a>
                        </p>
                    @endif
                    <p class="is-top-xsmall">
						<span class="icon">
							<i class="fa fa-phone"></i>
						</span>
                        {{ $user->phone ? $user->phone : '--' }}
                    </p>
                    <p class="is-top-xsmall">
                        <a href="{{ route('departments.show', $user->departament) }}" >
							<span class="icon">
								<i class="fa fa-building-o"></i>
							</span>
                            {{ $user->departament->name}}
                        </a>
                    </p>
                    @can('block', $user)
                        <div class="level">
                            <form action="{{ route('user.change') }}" method="post" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                                <button class="level-item button is-12 {{ $user->blocked == 1 ? 'is-success' : 'is-danger' }}" type="submit">
                                    {{ $user->blocked == 1 ? 'Desbloquear' : 'Bloquear' }}
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
                <div class="column is-4 name">
                    <p>
                        <span class="title is-bold">{{ $user->name }}</span>
                        <span class="subtitle is-6">{{ $user->email }}</span>
                    </p>
                    <p class="tagline">{{ $user->presentation }}</p>
                </div>
                <div class="column is-2 followers has-text-centered">
                    <p class="stat-val">{{ $user->requests()->done()->count() }} / {{ $user->requests()->count() }}</p>
                    <p class="stat-key">Pedidos Concluidos</p>
                </div>
                <div class="column is-2 following has-text-centered">
                    <p class="stat-val">{{ $user->requests()->done()->colored()->count() }} / {{ $user->requests()->colored()->count() }}</p>
                    <p class="stat-key">Pedidos a Cores</p>
                </div>
                <div class="column is-2 likes has-text-centered">
                    <p class="stat-val">{{ $user->requests()->done()->blackAndWhite()->count() }} / {{ $user->requests()->blackAndWhite()->count() }}</p>
                    <p class="stat-key">Pedidos a Preto & branco</p>
                </div>
            </div>
            <div class="columns is-top-medium">
                <div class="column">
                    <user-requests-types :user="{{ $user }}"></user-requests-types>
                </div>
                <div class="column">
                    <user-week-status :user="{{ $user }}"></user-week-status>
                </div>
            </div>
        </div>
    </div>
@stop


@section('title')
    Meu Perfil
@stop