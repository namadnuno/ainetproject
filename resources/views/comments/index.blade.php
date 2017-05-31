@extends('layouts.admin')

@section('title')
	Comentários
@stop

@section('content-child')
	@include('partials.messages')
	@include('partials.filter-box', [
        'filters' => [
        'created_at' => 'Data de Criação',
        'request_id' => 'Pedido',
        'user_id' => 'Utilizador'
        ],
        'newRoute' =>
        ''
        ])
	<div class="columns  is-multiline">
		@foreach ($comments as $comment)
			<div class="column is-12">
				<div class="box">
					<article class="media">
						<figure class="media-left">
							<p class="image is-64x64">
								@include('partials.profile_photo_of', ['user' => $comment->user])
							</p>
						</figure>
						<div class="media-content">
							<div class="content">
								<p>
									<strong>{{ $comment->user->name }}</strong>
									<br>
									{{ $comment->comment }}
									<small>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
								</p>
								<div class="level">
									<div class="level-right">
										<div class="level-item">
											<form action="{{ route('comments.change') }}" method="post">
												{{ csrf_field() }}
												{{ method_field('PUT') }}
												<input type="hidden" value="{{ $comment->id }}" name="comment_id">
												<button class="button {{ $comment->blocked == 1 ? 'is-success' : 'is-danger' }}" type="submit">
													@if($comment->blocked == 0)
														<span class="icon is-small">
													<i class="fa fa-lock" aria-hidden="true"></i> 
												</span>
														<span>
													Bloquear
												</span>
													@else
														<span class="icon is-small">
													<i class="fa fa-unlock" aria-hidden="true"></i> 
												</span>
														<span>
													Desbloquear
												</span>
													@endif
												</button>
											</form>
										</div>
									</div>
								</div>
							</div>
					</article>
				</div>
			</div>
		@endforeach
	</div>
	@include('partials.pagination', ['pagination' => $comments])
@stop