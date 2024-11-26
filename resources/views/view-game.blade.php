@extends('layouts.plantilla2')

@section('title', 'View Game')
@section('class', 'cuerpo')

@section('content')
    <!-- Cabecera -->
    <header>
        <section class="cabecera_view_game">
            <div>
                <a href="{{ url('/catalogue') }}">
                    <img class="icoback" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                </a>
                <img class="logotitulo" src="{{ asset('images/logo-cabecera_view.svg') }}" width="200px" alt="Logo">
            </div>

            <!-- Menú hamburguesa -->
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
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/ico-menu-home.png') }}" alt="Home Icon">
                            Home
                        </a>
                        <hr>
                        <a href="{{ url('login') }}">
                            <img src="{{ asset('images/ico-menu-login.png') }}" alt="Login Icon">
                            Login
                        </a>
                        <hr>
                        <a href="{{ url('catalogue') }}">
                            <img src="{{ asset('images/ico-menu-catalogue.png') }}" alt="Catalogue Icon">
                            Catalogue
                        </a>
                        <hr>
                    </menu>
                </nav>
            </div>
        </section>
    </header>

    <!-- Contenido del juego -->
    <section class="contenedor_titulos_parrafos_view">
        <div>
            <img class="img_perfil_usuario" src="{{ asset('images/' . $game->image) }}" alt="img perfil">
        </div>
        <section class="contenedor_titulo_view">
            <div class="titulo_view">
                <h3>Category</h3>
            </div>
            <div class="parrafo_view">
                <p>{{ $game->category->name }}</p>
            </div>
        </section>
        <section class="contenedor_titulo_view">
            <div class="titulo_view">
                <h3>Year</h3>
            </div>
            <div class="parrafo_view">
                <p>{{ $game->releasedate }}</p>
            </div>
        </section>
        <section class="contenedor_titulo_view">
            <div class="titulo_view">
                <h3>Description</h3>
            </div>
            <div class="parrafo_view">
                <p>{{ $game->description }}</p>
            </div>
        </section>
    </section>

    <footer>
        <div class="botonview">
            <a href="{{ url('/catalogue') }}" class="btn btn-explore">
                <img class="content-btn2-footer" src="{{ asset('images/content-btn4-footer.svg') }}" alt="explore">
            </a>
        </div>
    </footer>
@endsection

@section('js')
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script>
        $('header').on('click', '.btn-burger', function () {
            $(this).toggleClass('active');
            $('.nav').toggleClass('active');
            $('.contenido_menu').toggleClass('oculto');
        });
    </script>
@endsection