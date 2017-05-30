<nav class="nav has-shadow" id="menu">
    <div class="container">

        <a href="{{ url('/') }}" class="nav-item">
            <img src="{{ asset('images/logo/logo-sm.png') }}" alt="Bulma logo">
        </a>
        <a href="{{ url('/') }}" class="nav-item">
            Home
        </a>
        <a class="nav-item is-tab is-hidden-mobile" href="{{ route('departmentsAsGuest') }}">Departamentos</a>
        <a class="nav-item @isActiveClass('contacts.index')" href="{{ route('contacts.index') }}">
            Contactos
        </a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
        <span class="nav-item">
            @if(auth()->guest())
                <a href="{{ route('login') }}" class="button is-primary">
               <span class="icon">
                   <i class="fa fa-sign-in"></i>
               </span>
               <span>Login</span>
           </a>
                <a href="{{ route('register') }}" class="button is-primary">
               <span class="icon">
                   <i class="fa fa-user-plus"></i>
               </span>
               <span>Registar</span>
           </a>
            @else
                <span class="nav-item">
                    <a href="{{ route('requests.create') }}" class="button is-default is-bold">
                      Novo Pedido
                    </a>
                </span>
                @can('notifications', auth()->user())
                    <a href="{{ route('notifications') }}" class="nav-item is-tab">
                        <div class="icon is-small">
                            <i class="fa fa-bell"></i>
                            @if(expiredStatus() == 1)
                                <span class="tag is-danger is-small is-notification"></span>
                            @elseif(expiredStatus() == 0)
                                <span class="tag is-warning is-small is-notification"></span>
                            @else
                                <span class="tag is-info is-small is-notification"></span>
                            @endif
                        </div>
                    </a>
                @endcan
                <auth-menu :user="{{ auth()->user() }}"
                           thumb="{{ auth()->user()->profile_photo ? asset('storage/profiles/' . auth()->user()->profile_photo) : asset('profile_photo/no_photo.jpg') }}">
                    <a class="button is-link is-small is-fullwidth" href="{{ route('dashboard') }}">
                       <span>Dashboard</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        <button type="submit" class="button is-link is-block is-small is-fullwidth">
                            {{ csrf_field() }}
                            <span>Sair</span>
                        </button>
                    </form>
                </auth-menu>
            @endif
       </span>

    </div>
</nav>