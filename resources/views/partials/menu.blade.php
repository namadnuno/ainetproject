<nav class="nav">
    <div class="nav-left">
        <a href="{{ url('/') }}" class="nav-item">
            <img src="{{ asset('images/logo/logo-sm.png') }}" alt="Bulma logo">
        </a>
    </div>
    <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </span>
    <div class="nav-right nav-menu">
    <a href="{{ url('/') }}" class="nav-item">
            Home
        </a>
        <a class="nav-item">
            Departamentos
        </a>
        <a class="nav-item">
            Lista de Pedidos de Impressão
        </a>
        <a class="nav-item @isActiveClass('contacts.index')" href="{{ route('contacts.index') }}">
            Lista de Contactos
        </a>
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
           @endif
       </span>
   </div>
</nav>