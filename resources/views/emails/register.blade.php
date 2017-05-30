@component('mail::message')
# Olá Sr(a). {{ $user->name }}

A Sua conta foi registada com sucesso, confirme os dados a baixo;
<ul>
    <li><b>Nome:</b> {{ $user->name }}</li>
    <li><b>Email:</b> {{ $user->email }}</li>
    <li><b>Departamento:</b> {{ $user->department_id }}</li>
    <li><b>Telefone:</b> {{ $user->phone }}</li>
</ul>

<p>
    Para ativar a sua conta use o seguinte código:
    <pre>
        Código: {{ $user->remember_token }}
    </pre>
</p>

@component('mail::button', ['url' => route('not-activated', $user->remember_token)])
    Ativar Conta
@endcomponent

Com os melhores Cumprimentos,<br>
{{ config('app.name') }}
@endcomponent
