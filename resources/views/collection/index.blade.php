{{-- Ubicación: resources/views/collection/index.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'My Collection')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_mydash">
            <img class="logotitulo-mydash" src="{{ asset('images/logotitulo-mydash.svg') }}" alt="Logo">

            {{-- Menú hamburguesa --}}
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="contenedor_modulos_dash">
        @if (!$hasCategories && !$hasGames)
            <!-- Mensaje cuando no hay categorías ni juegos -->
            <div class="no-categories-games-message">
                <h2 class="notification-title">Upps!</h2><br>
                <p>Este usuario no tiene <span class="highlight1">categorías</span> ni <span class="highlight2">juegos</span> asociados.</p>
            </div>
        @elseif (!$hasCategories)
            <!-- Mensaje cuando no hay categorías -->
            <div class="no-categories-message">
                <h2 class="notification-title">Upps!</h2><br>
                <p>Este usuario no tiene <span class="highlight1">categorías</span> asociadas.</p>
            </div>
        @elseif (!$hasGames)
            <!-- Mensaje cuando no hay juegos -->
            <div class="no-games-message">
                <h2 class="notification-title">Upps!</h2><br>
                <p>Este usuario no tiene <span class="highlight2">juegos</span> asociados.</p>
            </div>
        @else
            <!-- Si existen categorías y juegos, mostramos los juegos agrupados -->
            @foreach ($categories as $categoryName => $games)
                <h3 class="titulo-categoria-mycollection">{{ $categoryName }}</h3>

                <section class="contenedor_dash">
                    @foreach ($games as $game)
                        <section class="contenido_dash">
                            <!-- Contenedor para la imagen de games en miniatura -->
                            <div class="img_perfil_miniatura">
                                <img class="img_perfil_usuario_miniatura"
                                     src="{{ $game->image ? asset('images/' . $game->image) : asset('images/no-photo.png') }}"
                                     alt="category Thumbnail">
                            </div>
                            <div class="texto-contenedor-dash">
                                <div class="titulo_modulo">
                                    <h4>{{ $game->title }}</h4>
                                </div>
                                <div class="parrafo_modulo">
                                    <p>{{ $game->genre }}</p>
                                </div>
                            </div>
                            <div class="boton_view_dash">
                                <!-- Botón de ver -->
                                <a href="{{ route('collection.show', $game->id) }}" class="btn btn-explore" aria-label="View {{ $game->title }}">
                                    <i class="fa-regular fa-eye icon-white icon-thin"></i>
                                </a>

                                <!-- Botón de eliminar -->
                                <a href="{{ route('collection.delete', $game->id) }}" class="btn btn-delete" aria-label="Delete {{ $game->title }}">
                                    <i class="fa-regular fa-trash-can icon-white icon-thin"></i>
                                </a>
                            </div>
                        </section>
                    @endforeach
                </section>
            @endforeach
        @endif
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Collection page loaded');

            // Manejo del menú hamburguesa
            document.querySelector('header').addEventListener('click', function(event) {
                if (event.target.closest('.btn-burger')) {
                    console.log('Burger menu button clicked');
                    document.querySelector('.btn-burger').classList.toggle('active');
                    document.querySelector('.nav').classList.toggle('active');
                    document.querySelector('.contenido_menu').classList.toggle('oculto');
                }
            });
        });
    </script>
@endsection
