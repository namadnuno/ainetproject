<nav class="nav has-shadow" id="menu">
    <div class="container">

        <a href="{{ url('/') }}" class="nav-item">
            <img src="{{ asset('images/logo/logo-sm.png') }}" alt="Bulma logo">
        </a>
        <a href="{{ url('/') }}" class="nav-item">
            Home
        </a>
        <a class="nav-item is-tab is-hidden-mobile" href="{{ route('departmentsAsGuest') }}">Departamentos</a>
        <a class="nav-item is-tab is-hidden-mobile">Impressões</a>
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
        <a class="nav-item is-tab is-hidden-tablet is-active">Home</a>
        <a class="nav-item is-tab is-hidden-tablet">Departamentos</a>
        <a class="nav-item is-tab is-hidden-tablet">Impressões</a>
        <a class="nav-item is-tab is-hidden-tablet">Contactos</a>

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
                <auth-menu :user="{{ auth()->user() }}"
                           thumb="{{ auth()->user()->profile_photo ? asset('profile_photo/' . auth()->user()->profile_photo) : asset('profile_photo/no_photo.jpg') }}">
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