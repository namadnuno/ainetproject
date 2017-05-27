@if($request->isRecusado())
    <div class="notification is-warning">
        <b>Este pedido foi recusado</b><br>
        <b>Razão: </b> <i>"{{ $request->refused_reason }}"</i>
    </div>
@endif
