<div class="box">
	<form action="{{ request()->url() }}" method="GET" >
		<div class="columns">
			<div class="column is-one-quarter">
				<div class="field has-addons">
					<p class="control">
						<input class="input is-small" type="text" placeholder="Procura" name="filter" value="{{ old('filter', request('filter'))  }}">
					</p>
				</div>
			</div>
			<div class="column">
				<div class="field is-marginless">
					<p class="control">
						<span class="select is-small" >
							<select name="orderby">
								@foreach ($filters as $filter => $title)
									<option value="{{ $filter }}" {{ old('orderby', request('orderby')) == $filter ? 'selected' : '' }} > {{ $title }}
									</option>
								@endforeach
							</select>
						</span>
					</p>
					<p class="help">Ordernar por</p>
				</div>
			</div>
			<div class="column is-one-quarter">
				<div class="field is-marginless">
					<p class="control">
						<span class="select is-small" >
							<select name="order">
									<option value="DESC" {{ old('order', request('order')) == "DESC" ? 'selected' : '' }} > Descendente
									</option>
									<option value="ASC" {{ old('order', request('order')) == "ASC" ? 'selected' : '' }} > Crescente
									</option>
							</select>
						</span>
					</p>
					 <p class="help">Ordem</p>
				</div>
			</div>
			<div class="column is-3 has-text-right">
				@if ($newRoute != '')
					<a class="button is-success is-small" href="{{ route($newRoute) }}">
					    <span>Criar</span>
					</a>
				@endif
				<button class="button is-info is-small" type="submit">Filtrar</button>
			</div>
		</div>
	</form>
</div>