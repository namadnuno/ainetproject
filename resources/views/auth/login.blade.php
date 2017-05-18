@extends('layouts.main')

@section('content')
<section class="hero is-small is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column">
                    <p class="title">
                        Login
                    </p>
                    <p class="subtitle">
                        Entre na sua conta para ter acesso ao <b>painel de administração</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="column is-half is-offset-one-quarter is-top-large">
            <div class="card is-centered">
                <div class="card-content">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="field">
                            <label for="email" class="label" >E-Mail Address</label>
                            <p>
                                <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                                name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif
                            </p>
                        </div>

                        <div class="field">
                            <label for="password" class="label">Password</label>

                            <p>
                                <input id="password" type="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                                @endif
                            </p>
                        </div>
                        <div class="field">
                          <p class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </p>
                    </div>    
                    <div class="field has-text-right">
                        <button type="submit" class="button is-primary">
                            Login
                        </button>

                        <a class="btn btn-link is-block " href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
