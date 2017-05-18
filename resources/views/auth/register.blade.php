@extends('layouts.main')

@section('content')
<section class="hero is-small is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column">
                    <p class="title">
                    Registo
                    </p>
                    <p class="subtitle">
                        Crie a sua conta para ter acesso ao <b>painel de administração</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="column is-half is-offset-one-quarter is-top-small">
            @include('partials.errors')
            <div class="card is-centered">
                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="field">
                            <label class="label">Nome</label>
                            <p class="control">
                                <input class="input" type="text" placeholder="Nome" name="name"
                                value="{{ old('name', $user->name)}}" required>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <p class="control">
                                <input class="input" type="text" placeholder="Email" name="email"
                                value="{{ old('email', $user->email) }}" required>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <p class="control">
                                <input class="input" type="password" placeholder="Password" name="password" required>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Confirmação da Password</label>
                            <p class="control">
                                <input class="input" type="password" placeholder="Confirmação da Password" name="password_confirmation" required>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Departamento</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    <select name="department_id" required>
                                        <option value="">-- Selecione o departamento --</option>
                                        @foreach (\App\Departament::all() as $departamento)
                                        <option {{ old('department_id', $user->department_id) == $departamento->id ? 'selected' : '' }} value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Telemovel</label>
                            <p class="control">
                                <input class="input" type="number" min="100000000" max="999999999" placeholder="Telemovel" name="phone"
                                value="{{ old('phone', $user->phone) }}" required>
                            </p>
                        </div>
                        <div class="field has-text-right">
                            <button type="submit" class="button is-primary">
                                Registo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
