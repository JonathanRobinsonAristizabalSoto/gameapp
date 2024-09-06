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
        @foreach ($categories as $categoryName => $games)
            <h3 class="titulo-categoria-mycollection">{{ $categoryName }}</h3> {{-- Categoría fuera del contenedor --}}

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
                            <a href="{{ route('collection.show', $game->id) }}" class="btn btn-explore">
                                <i class="fa-regular fa-eye icon-white icon-thin"></i>
                            </a>

                            <!-- Botón de eliminar -->
                            <a href="{{ route('collection.delete', $game->id) }}" class="btn btn-delete">
                                <i class="fa-regular fa-trash-can icon-white icon-thin"></i> <!-- Icono de eliminar -->
                            </a>
                        </div>
                    </section>
                @endforeach
            </section>
        @endforeach
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
