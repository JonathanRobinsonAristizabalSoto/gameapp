@extends('layouts.plantilla2')

@section('title', 'Games Module')
@section('class', 'cuerpo')

@section('content')
    <!-- cabecera -->
    <header>
        <section class="cabecera_gamer">
            <a href="{{ route('dashboard') }}">
                <img class="icoback-gamer" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-gamers" src="{{ asset('images/logo-cabecera_games.svg') }}" alt="Logo">

            <!-- Incluir Menú hamburguesa -->
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">

        <!-- Mensajes de éxito y error -->
        @if (session('success'))
            <div class="alert alert-success" id="success-message"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px; display: none;">
                {{ session('success') }}
            </div>
        @endif

        <!-- caja de busqueda -->
        <div class="search-box">
            <input type="text" id="qsearch" placeholder="Buscar">
            <i class="fas fa-filter filter-icon"></i>
        </div>

        <!-- boton add -->
        <div class="botonuser">
            <form action="{{ route('games.create') }}">
                <button class="btn-user" type="submit">
                    <i class="fas fa-plus icon-white icon-thin"></i> <!-- Icono de añadir -->
                </button>
            </form>
        </div>

        <!-- contenido games -->
        <section class="contenedor_modulos_dash" id="list">
            @include('games.partials.game_list', ['games' => $games])
        </section>
    </section>
@endsection

@section('js')
    <script>
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active');
            $('.nav').toggleClass('active');
            $('.contenido_menu').toggleClass('oculto');
        });

        // Script para búsqueda en tiempo real
        $(document).ready(function() {
            $('body').on('keyup', '#qsearch', function(e) {
                e.preventDefault();
                var query = $(this).val();
                var token = '{{ csrf_token() }}';

                if (query === '') {
                    // Si el campo de búsqueda está vacío, recargar todos los juegos
                    $.ajax({
                        url: '{{ route('games.index') }}',
                        method: 'GET',
                        success: function(data) {
                            $('#list').html($(data).find('#list').html());
                        }
                    });
                } else {
                    // Si hay una consulta, realizar la búsqueda
                    $.ajax({
                        url: '{{ route('games.search') }}',
                        method: 'POST',
                        data: {
                            query: query,
                            _token: token
                        },
                        success: function(data) {
                            $('#list').html(data.html);
                        }
                    });
                }
            });

            // Mostrar y ocultar el mensaje de éxito de manera suave
            $('#success-message').fadeIn('slow', function() {
                setTimeout(function() {
                    $('#success-message').fadeOut('slow');
                }, 3000);
            });
        });
    </script>
@endsection
