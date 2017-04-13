<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PrintIT</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>
    	<nav class="nav">
            <div class="nav-left">
                <a class="nav-item">
                    <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
                </a>
            </div>
            <span class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </span>
            <div class="nav-right nav-menu">
                <a class="nav-item">
                    Home
                </a>
                <a class="nav-item">
                    Documentation
                </a>
                <a class="nav-item">
                    Blog
                </a>
                <span class="nav-item">
                    @if(auth()->guest())
	                    <a class="button is-primary">
	                        <span class="icon">
	                            <i class="fa fa-download"></i>
	                        </span>
	                        <span>Download</span>
	                    </a>
                    @else
                    	<a class="button is-primary" href="{{ route('dashboard') }}">
	                        <span class="icon">
	                            <i class="fa fa-dashboard"></i>
	                        </span>
                        	<span>Dashboard</span>
                    	</a>
                    @endif
                </span>
            </div>
        </nav>
    @yield('content')

    </body>
</html>