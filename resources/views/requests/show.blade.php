@extends('layouts.admin')

@section('content-child')
@include('requests.refuse-box')
@include('requests.admin-controls')
<div class="columns">
	<div class="column is-3">
		<div class="box">
			<div class="media-image">
				<figure class="image">
					@if(isImage($request))
						<img src="{{ route('getFile', $request) }}" alt="pedido" />
					@else  
                        <img src="{{ asset('/files_formats/' . typeFile($request) . '.png')}}" alt="" />
                    @endif
					</figure>
				</div>
				<div class="media-content">
					<div class="content">
						<div class="level-item is-top-xsmall">
							@if ($request->status == 0)
							<span class="tag is-danger">
								Recusado
							</span>
							@elseif($request->status == 1)
							<span class="tag is-warning">
								Pendente
							</span>
							@else
							<span class="tag is-success">
								Concluído
							</span>
							@endif
						</div>

						@if($request->status == 2)
						<div class="level-item is-top-xsmall">
							<span class="icon is-small">
								@for ($i = 0; $i < $request->satisfaction_grade; $i++)
								<i class="fa fa-star"></i>
								@endfor
							</span>
						</div>
						@endif

						<div class="has-text-centered is-top-xsmall">
							<a href="{{ route('downloadFile', $request) }}"  class="button is-primary has-icon">
								<span class="icon is-small">
									<i class="fa fa-download"></i>
								</span>
								<span>
									Download
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="box">
				<div class="level">
					<div class="level-left">
						<div class="level-item">
							<p class="title is-4">Pedido nº {{ $request->id }} </p>							
						</div>
					</div>
					<div class="level-right">
						<div class="level-item">
							@if($request->due_date)
								@if(carbon($request->due_date)->lt(carbon()))
									<span class="tag is-warning">Expirado a {{ carbon($request->due_date)->toDateString() }}</span>
								@else
									<span class="tag is-info">Expira a {{ carbon($request->due_date)->toDateString() }}</span>
								@endif
							@endif
						</div>
						<div class="level-item">
							<i>{{ $request->created_at->diffForHumans() }}</i>
						</div>						
					</div>
				</div>
				<div class="content">
					<p>
						{{ $request->description }}
					</p>
					@if($request->isDone())
						<p>
							<b>Impressora: </b> {{ $request->printer->name }}
						</p>
					@endif
					<p>
						<span class="tag {{ $request->colored == 1 ? 'is-primary' : 'is-dark' }}">
							<span class="icon is-small">
								<i class="fa fa-{{ typeFile($request) }}"></i>
							</span>
						</span>
						<span class="tag is-info">
							<span class="icon is-small">
								<i class="fa fa-print"> {{ $request->quantity }}</i>
							</span>
						</span>
						<span class="tag {{ $request->stapled == 1 ? 'is-info' : 'is-warning' }}">
							{{ $request->stapled == 1 ? 'É' : 'Não é' }} agrafado
						</span>
						<span class="tag {{ $request->stapled == 1 ? 'is-info' : 'is-warning' }}">
							{{ $request->front_back == 1 ? 'É' : 'Não é' }} frente e verso
						</span>
						<span class="tag is-info">
							A{{ $request->paper_size }}
						</span>
						<span class="tag is-primary">
							Papel 
							@if ($request->paper_type == 1)
							normal
							@elseif($request->paper_type == 2)
							rascunho
							@else
							fotográfico
							@endif
						</span>
					</p>
				</div>
			</div>
			<div class="box">
				<div class="media-content">
					<p class="title is-5">Comentários</p>
					@foreach ($request->comments()->parents()->atives()->get() as $comment)
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
									<br>
									<small>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
								</p>
							</div>
							@foreach ($comment->childrens()->atives()->get() as $childrenComment)
							<article class="media">
								<figure class="media-left">
									<p class="image is-64x64">
										@include('partials.profile_photo_of', ['user' => $childrenComment->user])
									</p>
								</figure>
								<div class="media-content">
									<div class="content">
										<p>
											<strong>{{ $childrenComment->user->name }}</strong>
											<br>
											{{ $childrenComment->comment }}
											<br>
											<small>{{ \Carbon\Carbon::parse($childrenComment->created_at)->diffForHumans() }}</small>
										</p>
									</div>
								</div>
							</article>
							@endforeach

							<!--apenas responder a comentarios em pedidos pendentes-->
							@if($request->status == 1)
							<article class="media">
								<figure class="media-left">
									<p class="image is-64x64">
										@include('partials.profile_photo')
									</p>
								</figure>
								<div class="media-content">
									<form method="post" action="{{ route('comments.store') }}">
										@include('partials.errors')
										{{ csrf_field() }}
										<div class="field">
											<p class="control">
												<input class="input is-small" name="comment" placeholder="Resposta ao Comentário">
											</p>
											<input type="hidden" name="request_id" value="{{ $request->id }}">
											<input type="hidden" name="parent_id" value="{{ $comment->id }}">
										</div>
										<div class="field">
											<p class="control">
												<button type="submit" class="button">Responder</button>
											</p>
										</div>
									</form>
								</div>
							</article>
							@endif
						</div>
					</article>
					@endforeach
					
					<!--apenas comentar em pedidos pendentes-->
					@if($request->status == 1)
					<article class="media">
						<figure class="media-left">
							<p class="image is-64x64">
								@include('partials.profile_photo')
							</p>
						</figure>
						<div class="media-content">
							<form method="post" action="{{ route('comments.store') }}">
								@include('partials.errors')
								{{ csrf_field() }}
								<div class="field">
									<p class="control">
										<input class="input is-small" name="comment" placeholder="Novo Comentário">
									</p>
									<input type="hidden" name="request_id" value="{{ $request->id }}">
								</div>
								<div class="field">
									<p class="control">
										<button type="submit" class="button">Comentar</button>
									</p>
								</div>
							</form>
						</div>
					</article>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="level-right">
		<a href="{{ URL::previous() }}" class="level-item button is-primary">Voltar</a>
	</div>
	@endsection

	@section('title')
	Pedido #{{ $request->id }}
	@endsection