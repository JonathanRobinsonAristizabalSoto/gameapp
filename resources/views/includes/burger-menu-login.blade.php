<!-- resources/views/includes/burger-menu-login.blade.php -->
<div class="burger-menu">
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
    <nav class="nav">
        <img class="ico-menu-title" src="{{ asset('images/ico-menu-title.svg') }}" alt="Menu">
        <img class="ico-menu" src="{{ asset('images/ico-menu.png') }}" alt="Icon menu">
        <menu class="contenido_menu oculto">
            <a href="{{ url('register') }}" class="btn-register">
                <img src="{{ asset('images/ico-menu-register.png') }}" alt="Register Icon">
                Register
            </a>
            <hr>
            <a href="{{ url('catalogue') }}" class="btn-catalogue">
                <img src="{{ asset('images/ico-menu-catalogue.png') }}" alt="Catalogue Icon">
                Catalogue
            </a>
            <hr>
        </menu>
    </nav>
</div>
