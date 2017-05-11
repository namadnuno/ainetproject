<div class="box">
	<form action="{{ request()->url() }}" method="GET" >
		<div class="columns">
			<div class="column is-one-quarter">
				<strong>Pesquisa</strong>
				<div class="field has-addons">
					<p class="control">
						<input class="input" type="text" placeholder="Procura" name="filter" value="{{ old('filter', request('filter'))  }}">
					</p>
				</div>
			</div>
			{{ csrf_field() }}
			<div class="column is-one-quarter">
				<strong>Ordernar por</strong>
				<div class="field is-marginless">
					<p class="control">
						<span class="select" >
							<select name="orderby">
								@foreach ($filters as $filter => $title)
									<option value="{{ $filter }}" {{ old('orderby', request('orderby')) == $filter ? 'selected' : '' }} > {{ $title }}
									</option>
								@endforeach
							</select>
						</span>
					</p>
				</div>
			</div>
			<div class="column is-one-quarter">
				<strong>Ordem</strong>
				<div class="field is-marginless">
					<p class="control">
						<span class="select" >
							<select name="order">
									<option value="DESC" {{ old('order', request('order')) == "DESC" ? 'selected' : '' }} > Descendente
									</option>
									<option value="ASC" {{ old('order', request('order')) == "ASC" ? 'selected' : '' }} > Crescente
									</option>
							</select>
						</span>
					</p>
				</div>
			</div>
			<div class="column is-one-quarter">
				<!--<strong>Opções</strong><br>-->
				<p class="control">
				<button class="button is-info" type="submit">Filtar</button>
				@if ($newRoute != '')
					<a class="button is-success" href="{{ route($newRoute) }}">Novo</a>
				@endif
				</p>
			</div>
		</div>

		<!--<nav class="level">
			<div class="level-left">
				<div class="level-item">

				</div>
			</div>
			
			<div class="level-right">
				<p class="level-item">
					
				</p>
				<p class="level-item">
					
				</p>
				<p class="level-item"><a></a></p>
				<p class="level-item">
					
				</p>
				<p class="level-item">
					
				</p>
				<p class="level-item"><a></a></p>
				<p class="level-item">
					
				</p>

			</div>
		</nav>-->
	</form>
</div>