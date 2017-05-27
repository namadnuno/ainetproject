@if(auth()->user()->isAdmin())
    @if($request->isRecusado())
            <div class="notification is-warning">
                <button class="delete"></button>
                <b>Este pedido foi recusado</b><br>
                <b>Razão: </b> <i>"{{ $request->refused_reason }}"</i>
            </div>
    @endif
@endif