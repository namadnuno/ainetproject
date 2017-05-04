<nav class="pagination">
  	<a class="pagination-previous" title="This is the first page" href="{{ request()->url() . '?page=' . ($pagination->currentPage() - 1) }}" {{ $pagination->currentPage() == 1 ? 'disabled' : '' }}>Anterior</a>
  	<a class="pagination-next" href="{{ request()->url() . '?page=' . ($pagination->currentPage() + 1) }}" {{ $pagination->currentPage() == $pagination->lastPage() ? 'disabled' : '' }}>Proxima</a>
  	<ul class="pagination-list">
  		@for ($i = 1; $i <= $pagination->lastPage() ; $i++)
	  		<li>
	  			<a href="{{ request()->url() . '?page=' . $i }}" class="pagination-link 
	  			{{ $pagination->currentPage() == $i ? 'is-current' : '' }}">
	  				{{ $i }}
	  			</a>
	  		</li>
  		@endfor
  	</ul>
</nav>