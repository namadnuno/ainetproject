@component('mail::message')
# Novo Pedido

Veja o pedido a baixo:

@component('mail::button', ['url' => route('requests.show', $request)])
Ver Pedido
@endcomponent

Cumprimentos,<br>
{{ config('app.name') }}
@endcomponent
