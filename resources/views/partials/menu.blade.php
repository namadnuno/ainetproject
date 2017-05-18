<nav class="nav has-shadow">
  <div class="container">
    
        <a href="{{ url('/') }}" class="nav-item">
            <img src="{{ asset('images/logo/logo-sm.png') }}" alt="Bulma logo">
        </a>
      <a href="{{ url('/') }}" class="nav-item">
            Home
        </a>
      <a class="nav-item is-tab is-hidden-mobile">Departamentos</a>
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
           @else
           <a class="button is-primary" href="{{ route('dashboard') }}">
               <span class="icon">
                   <i class="fa fa-dashboard"></i>
               </span>
               <span>Dashboard</span>
           </a>

          <form action="{{ route('logout') }}" method="POST">
            <button class="button is-primary">
                {{ csrf_field() }}
               <span class="icon">
                   <i class="fa fa-sign-in"></i>
               </span>
               <span>Logout</span>
           </button>
          </form>
           

           @endif
       </span>  

  </div>
</nav>