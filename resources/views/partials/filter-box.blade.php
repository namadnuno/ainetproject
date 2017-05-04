<div class="box">
	<form action="{{ request()->url() }}" method="GET" >
		<nav class="level">
			<div class="level-left">
				<div class="level-item">
					<div class="field has-addons">
						<p class="control">
							<input class="input" type="text" placeholder="Procura" name="filter" value="{{ old('filter', request('filter'))  }}">
						</p>
					</div>
				</div>
			</div>
			{{ csrf_field() }}
			<div class="level-right">
				<p class="level-item">
					<strong>Ordernar por:</strong>
				</p>
				<p class="level-item">
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
				</p>
				<p class="level-item"><a></a></p>
				<p class="level-item">
					<strong>Ordem:</strong>
				</p>
				<p class="level-item">
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
				</p>
				<p class="level-item"><a></a></p>
				<p class="level-item">
					<button class="button is-info" type="submit">Filtar</button>
				</p>
				@if ($newRoute != '')
					<p class="level-item">
						<a class="button is-success" href="{{ route($newRoute) }}">Novo</a>
					</p>
				@endif
			</div>
		</nav>
	</form>
</div>