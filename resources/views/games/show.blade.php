{{-- Ubicación del archivo: gameapp/resources/views/games/show.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Show Game')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_gamer">
            <a href="{{ url('games') }}">
                <img class="icoback-gamer" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-gamer" src="{{ asset('images/logo_show.svg') }}" alt="Logo">
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">
        <div class="contenedor-show">
            <div class="img_perfiles">
                <img class="img_perfil_usuario"
                    src="{{ $game->image ? asset('images/' . $game->image) : asset('images/no-photo.png') }}"
                    alt="Game Image">
            </div>
            {{-- Datos del juego --}}
            <div class="subcontenedor_show">
                <p class="titulo_fullname">{{ $game->title }}</p>
                <p class="titulo_email">{{ $game->developer }}</p>
                <p class="titulo_role">{{ $game->category->name }}</p>
            </div>
            <div class="subcontenedor_show_grillgames">
                <div class="contenedores_show">
                    <label for="">Fecha de lanzamiento:</label>
                    <p>{{ $game->releasedate }}</p>
                </div>
                <div class="contenedores_show">
                    <label for="">Precio:</label>
                    <p>{{ $game->price }}</p>
                </div>
                <div class="contenedores_show">
                    <label for="">Género:</label>
                    <p>{{ $game->genre }}</p>
                </div>
                <div class="contenedores_show">
                    <label for="">Descripción:</label>
                    <p>{{ $game->description }}</p>
                </div>
                <div class="contenedores_show">
                    <label for="">Slider:</label>
                    <p>{{ $game->slider ? 'Activo' : 'No activo' }}</p>
                </div>
                <div class="contenedores_show">
                    <label for="">Fecha de creación:</label>
                    <p>{{ $game->created_at }}</p>
                </div>
                <div class="contenedores_show">
                    <label for="">Fecha de actualización:</label>
                    <p>{{ $game->updated_at }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // Script para el menú hamburguesa
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('header').addEventListener('click', function(event) {
                if (event.target.closest('.btn-burger')) {
                    document.querySelector('.btn-burger').classList.toggle('active');
                    document.querySelector('.nav').classList.toggle('active');
                }
            });
        });
    </script>
@endsection
