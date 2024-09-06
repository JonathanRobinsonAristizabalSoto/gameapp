{{-- Ubicación: gameapp/resources/views/catalogue.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Catalogue')
@section('class', 'cuerpo')

@section('content')
    <!-- Loader -->
    <div id="loader" class="loader" style="display: none;"></div>

    <!-- Contenido del catálogo con carga suave -->
    <div id="catalogue-content" style="display: none;">
        <!-- Cabecera -->
        <header>
            <section class="cabecera_catalogue">
                <!-- Botón de regreso -->
                <a href="{{ url('/') }}">
                    <img class="icoback" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                </a>
                <!-- Logo -->
                <img class="logotitulo" src="{{ asset('images/ico-menu-title.svg') }}" alt="Logo">

                <!-- Menú hamburguesa -->
                <div class="burger-menu">
                    <!-- Icono del menú hamburguesa -->
                    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                        <path class="line top"
                            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                        <path class="line middle" d="m 70,50 h -40" />
                        <path class="line bottom"
                            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
                    </svg>
                    {{-- Contenido del menú --}}
                    <nav class="nav">
                        <img class="ico-menu-title" src="{{ asset('images/ico-menu-title.svg') }}" alt="Menu">
                        <img class="ico-menu" src="{{ asset('images/ico-menu.png') }}" alt="Icon Menu">
                        <menu class="contenido_menu">
                            <!-- Enlace para login en el menú hamburguesa -->
                            <a href="{{ url('login') }}" class="btn-login">
                                <img src="{{ asset('images/ico-menu-login.png') }}" alt="Login Icon">
                                Login
                            </a>

                            <hr>
                            <a href="{{ url('register') }}" class="btn-register">
                                <img src="{{ asset('images/ico-menu-register.png') }}" alt="Register Icon">
                                Register
                            </a>
                            <hr>
                        </menu>
                    </nav>
                </div>
            </section>
        </header>

        <!-- Contenido del catálogo -->
        <section class="scroll">
            <!-- Caja de búsqueda -->
            <div class="search-box">
                <input type="text" placeholder="Buscar">
                <i class="fas fa-filter filter-icon"></i>
            </div>

            <!-- Slider por categorías -->
            <!-- Categoría 1 -->
            <div class="contenedor_titulo_caja_catalogue">
                <h3>Category 1</h3>
            </div>
            <section class="slidercat">
                <section class="slider owl-carousel owl-theme">
                    <div>
                        <img class="item" src="{{ asset('images/Slide-cat01.png') }}" alt="Slide01" loading="lazy">
                        <a href="{{ url('view_game') }}">
                            <h4>Ramboin Six</h4>
                        </a>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                    <div>
                        <img class="item" src="{{ asset('images/Slide-cat02.png') }}" alt="Slide02" loading="lazy">
                        <a href="{{ url('view_game') }}">
                            <h4>Skyyrim</h4>
                        </a>
                        <p>Lorem ipsum dolor sit a.</p>
                    </div>
                </section>
            </section>

            <!-- Categoría 2 -->
            <div class="contenedor_titulo_caja_catalogue">
                <h3>Category 2</h3>
            </div>
            <section class="slidercat">
                <section class="slider owl-carousel owl-theme">
                    <div>
                        <img class="item" src="{{ asset('images/Slide-cat03.png') }}" alt="Slide03" loading="lazy">
                        <a href="{{ url('view_game') }}">
                            <h4>Halo Reach</h4>
                        </a>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                    <div>
                        <img class="item" src="{{ asset('images/Slide-cat04.png') }}" alt="Slide04" loading="lazy">
                        <a href="{{ url('view_game') }}">
                            <h4>Resident Evil 4</h4>
                        </a>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </section>
            </section>

            <!-- Categoría 3 -->
            <div class="contenedor_titulo_caja_catalogue">
                <h3>Category 3</h3>
            </div>
            <section class="slidercat">
                <section class="slider owl-carousel owl-theme">
                    <div>
                        <img class="item" src="{{ asset('images/Slide-cat01.png') }}" alt="Slide01" loading="lazy">
                        <a href="{{ url('view_game') }}">
                            <h4>Ramboin Six</h4>
                        </a>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                    <div>
                        <img class="item" src="{{ asset('images/Slide-cat02.png') }}" alt="Slide02" loading="lazy">
                        <a href="{{ url('view_game') }}">
                            <h4>Skyyrim</h4>
                        </a>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </section>
            </section>

            <!-- Categoría 4 -->
            <div class="contenedor_titulo_caja_catalogue">
                <h3>Category 4</h3>
            </div>
            <section class="slidercat">
                <section class="slider owl-carousel owl-theme">
                    <div>
                        <img class="item" src="{{ asset('images/Slide-cat03.png') }}" alt="Slide03" loading="lazy">
                        <a href="{{ url('view_game') }}">
                            <h4>Halo Reach</h4>
                        </a>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                    <div>
                        <img class="item" src="{{ asset('images/Slide-cat04.png') }}" alt="Slide04" loading="lazy">
                        <a href="{{ url('view_game') }}">
                            <h4>Resident Evil 4</h4>
                        </a>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </section>
            </section>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Muestra el contenido del catálogo con una carga suave
            $('#catalogue-content').hide().fadeIn(400);

            // Inicialización del carrusel
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 2
                    }
                }
            });

            // Función para el menú hamburguesa
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active');
                $('.nav').toggleClass('active');
            });

            // Evento click para el botón de login en el menú hamburguesa
            $('.btn-login').on('click', function(event) {
                event.preventDefault();
                $('#catalogue-content').fadeOut(400, function() {
                    $('#loader').fadeIn(300, function() {
                        setTimeout(function() {
                            $('#loader').fadeOut(300, function() {
                                window.location.href = "{{ url('login') }}";
                            });
                        }, 300);
                    });
                });
            });

            // Evento click para el botón de registro en el menú hamburguesa
            $('.btn-register').on('click', function(event) {
                event.preventDefault();
                $('#catalogue-content').fadeOut(400, function() {
                    $('#loader').fadeIn(300, function() {
                        setTimeout(function() {
                            $('#loader').fadeOut(300, function() {
                                window.location.href = "{{ url('register') }}";
                            });
                        }, 300);
                    });
                });
            });
        });
    </script>
@endsection

