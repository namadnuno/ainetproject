@extends('layouts.admin')

@section('content-child')
<div class="columns">
	<div class="column is-3">
		<div class="box">
			<div class="media-image">
				<figure class="image">
					@if(pathinfo(asset($request->file))['extension'] == 'jpg' ||
						pathinfo(asset($request->file))['extension'] == 'png' ||
						pathinfo(asset($request->file))['extension'] == 'jpeg' ||
						pathinfo(asset($request->file))['extension'] == 'tiff')
						<img src="{{asset('file-thumb/'. $request->file)}}" alt="">

						@else 

						<img src="{{ asset('/files_formats/' . pathinfo(asset($request->file))['extension'] . '.png' )}}" alt="">
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
						<div class="has-text-centered is-top-small">
							<form action="{{ route('download') }}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="file" value="{{ $request->file }}">
								<button type="submit" class="button is-primary has-icon">
									<span class="icon is-small">
										<i class="fa fa-download"></i>
								    </span>
      								<span>
      									Download
      								</span>
      							</button>
							</form>
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
							<b>Pedido nº {{ $request->id }} </b>							
						</div>
					</div>
					<div class="level-right">
						<div class="level-item">
							<i>{{ \Carbon\Carbon::parse($request->created_at)->diffForHumans() }}</i>	
						</div>						
					</div>
				</div>
				<div class="content">
					<p>
						{{ $request->description }}
					</p>
					<p>
						<span class="tag {{ $request->colored == 1 ? 'is-primary' : 'is-dark' }}">
							{{ $request->colored == 1 ? 'Cores' : 'Preto e Branco' }}
						</span>
						<span class="tag is-info">
							{{ $request->quantity }} {{ $request->quantity > 1 ? 'Cópias' : 'Cópia' }}
						</span>
						<span class="tag {{ $request->stapled == 1 ? 'is-info' : 'is-warning' }}">
							{{ $request->stapled == 1 ? 'É' : 'Não é' }} agrafado
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
								@foreach ($comment->childrens()->atives() as $childrenComment)
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
												<textarea class="textarea is-small" name="comment" placeholder="Novo Comentário"></textarea>
												</p>
												<input type="hidden" name="request_id" value="{{ $request->id }}">
												<input type="hidden" name="parent_id" value="{{ $comment->id }}">
											</div>
											<div class="field">
												<p class="control">
													<button type="submit" class="button">Comentar</button>
												</p>
											</div>
										</form>
									</div>
								</article>
							</div>
						</article>
					@endforeach
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
									<textarea class="textarea" name="comment" placeholder="Novo Comentário"></textarea>
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
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('title')
	Pedido #{{ $request->id }}
	@endsection