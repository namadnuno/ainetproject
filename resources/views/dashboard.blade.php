@extends('layouts.admin')

@section('content-child')
	<div class="columns">
		<div class="column is-half">
			<div class="card notification is-primary">
				<div class="card-content">
					<div class="content">
						<p class="title is-1 is-large has-text-centered">
							{{ auth()->user()->requests()->ofToday()->count() }}
						</p>
						<p class="subtitle has-text-centered">
							Impressões Hoje
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="column is-half">
			<div class="card notification is-info">
				<div class="card-content">
					<div class="content">
						<p class="title is-1 is-large has-text-centered">
							{{ auth()->user()->requests()->ofMonth()->count() }}
						</p>
						<p class="subtitle has-text-centered">
							Impressões Este Mês
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="section is-paddingless">
			<chart-mouth-prints></chart-mouth-prints>
		</div>
	</div>
	<div class="column">
		<div class="section is-paddingless">
			<div class="card">
				<div class="card-header">
					<p class="card-header-title">
						Últimos Pedidos
					</p>
				</div>
				<div class="card-content">
					@if (auth()->user()->requests()->count() > 0)
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Data do pedido</th>
								<th>Quantity</th>
								<th>Cores/Preto e Branco</th>
								<th>Estado</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach (auth()->user()->requests()->take(5)->orderBy('created_at', 'ASC')->get() as $request)
								<tr>
									<td>{{ $request->id }}</td>
									<td>{{ carbon($request->created_at)->diffForHumans() }}</td>
									<td>{{ $request->quantity }}</td>
									<td>{{ $request->colored == 1 ? 'Cores' : 'Preto e Branco' }}</td>
									<td>
										@if($request->status == 0)
											{{ 'Recusado' }}
										@elseif($request->status == 1)
											{{ 'Pendente' }}
										@else
											{{ 'Concluido' }}
										@endif
									</td>
									<td>	
										<a href="{{ url('dashboard/requests/' . $request->id ) }}" class="button">
											<span class="icon">
												<i class="fa fa-eye"></i>
											</span>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					@else
						<p class="notification is-success">
							Nenhum pedido em espera!
						</p>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop

@section('title')
Painel de Administração
@stop