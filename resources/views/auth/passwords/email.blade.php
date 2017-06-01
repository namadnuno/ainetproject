@extends('layouts.main')

@section('content')
    @include('partials.section-header',
	[
	    'title' => 'Recuperar Password',
	    'subtitle' => 'Insira a sua conta de email para recuperar a password'
	]);
    @include('partials.messages')
    <div class="container is-top-medium is-bottom-medium">
        <div class="row">
            <div class="column is-half is-offset-one-quarter is-top-small">
                @include('partials.errors')
                <div class="card is-centered">
                    <div class="card-content">
                        <form role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" name="email" type="email" placeholder="Email input" value="{{ old('email', ' ') }}">
                                </p>
                                @if ($errors->has('email'))
                                    <p class="help {{ $errors->has('email') ? ' is-danger' : '' }}">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>
                            <div class="level level-right">
                                <button type="submit" class="button is-success level-item">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
