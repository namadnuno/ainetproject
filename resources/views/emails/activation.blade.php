@component('mail::message')
# Olá {{ $user->name }}
<br>
Clique no botão a baixo para validar o seu email.

<pre>
    Código: {{ $user->remember_token }}
</pre>

@component('mail::button', ['url' => route('not-activated', $user->remember_token)])
Ativar Conta
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
