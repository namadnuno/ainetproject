<div class="media-content">
    <div class="content">
        <p><strong>{{ auth()->user()->name }}</strong><!-- <small>{{ auth()->user()->email }}</small>--></p>
        <p>{{ auth()->user()->presentation }}</p>
    </div>
</div>

<div class="columns">
    <div class="column is-half">
        <a class="has-text-left">
            <span class="icon">
                <i class="fa fa-phone"></i>
            </span>
            {{ auth()->user()->phone ? auth()->user()->phone : 'Não há contacto' }}
        </a>
    </div>
    <div class="column is-half">
        <a class="has-text-lef">
            <span class="icon">
                <i class="fa fa-link"></i>
            </span>
            {{ auth()->user()->phone ? auth()->user()->profile_url : 'Não há ligação para um perfil externo' }}
        </a>
    </div>
</div>

<div class="columns">
    <div class="column is-half">
        <a class="has-text-left">
            <span class="icon">
                <i class="fa fa-envelope"></i>
            </span>
            {{ auth()->user()->email }}
        </a>
    </div>
    <div class="column is-half">
        <a class="has-text-left">
            <span class="icon">
                <i class="fa fa-building-o"></i>
            </span>
            {{ auth()->user()->departament->name }}
        </a>
    </div>
</div>

<!--<nav class="level is-mobile">
    <div class="level-left">
        <a class="level-item">
            <span class="icon is-small">
                <i class="fa fa-phone"></i>
            </span>
            {{ auth()->user()->phone ? auth()->user()->phone : 'Não há contacto' }}
        </a>
        <a class="level-item">
            <span class="icon is-small">
                <i class="fa fa-link"></i>
            </span>
            {{ auth()->user()->phone ? auth()->user()->profile_url : 'Não há ligação para um perfil externo' }}
        </a>
        <a class="level-item">
            <span class="icon is-small">
                <i class="fa fa-building-o"></i>
            </span>
            {{ auth()->user()->departament->name }}
        </a>
    </div>
</nav>-->