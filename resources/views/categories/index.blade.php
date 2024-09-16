{{-- Ubicación: gameapp/resources/views/categories/index.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Categories Module')
@section('class', 'cuerpo')

@section('content')
    <!-- Cabecera -->
    <header>
        <section class="cabecera_categories">
            <!-- Enlace al dashboard -->
            <a href="{{ route('dashboard') }}">
                <img class="icoback-dash" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-dash" src="{{ asset('images/logo-cabecera_categories.svg') }}" alt="Logo">

            <!-- Incluir Menú hamburguesa -->
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">

        <!-- Mensajes de éxito y error -->
        @if (session('success'))
            <div class="alert alert-success" id="success-message" role="alert"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error" id="error-message" role="alert"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px;">
                {{ session('error') }}
            </div>
        @endif

        <!-- Caja de búsqueda -->
        <div class="search-box">
            <input type="text" id="qsearch" placeholder="Buscar">
            <i class="fas fa-filter filter-icon"></i>
        </div>

        <!-- Botón agregar -->
        <div class="botonuser">
            <a href="{{ route('categories.create') }}">
                <button class="btn-user">
                    <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add Category">
                </button>
            </a>
        </div>

        <!-- Contenido del dashboard -->
        <section class="contenedor_modulos_dash" id="list">
            @include('categories.partials.category_list', ['categories' => $categories])
        </section>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Script para el menú hamburguesa
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active');
                $('.nav').toggleClass('active');
                $('.contenido_menu').toggleClass('oculto');
            });

            // Script para búsqueda en tiempo real
            $('#qsearch').on('keyup', function() {
                var query = $(this).val();
                var token = '{{ csrf_token() }}';

                if (query === '') {
                    // Si el campo de búsqueda está vacío, recargar todas las categorías
                    $.ajax({
                        url: '{{ route('categories.index') }}',
                        method: 'GET',
                        success: function(data) {
                            $('#list').html($(data).find('#list').html());
                        }
                    });
                } else {
                    // Si hay una consulta, realizar la búsqueda
                    $.ajax({
                        url: '{{ route('categories.search') }}',
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
            @if (session('success'))
                $('#success-message').fadeIn('slow', function() {
                    setTimeout(function() {
                        $('#success-message').fadeOut('slow');
                    }, 4000);
                });
            @endif

            // Mostrar y ocultar el mensaje de error de manera suave
            @if (session('error'))
                $('#error-message').fadeIn('slow', function() {
                    setTimeout(function() {
                        $('#error-message').fadeOut('slow');
                    }, 4000);
                });
            @endif
        });
    </script>
@endsection
