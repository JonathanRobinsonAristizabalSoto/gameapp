{{-- Ubicación: gameapp/resources/views/dashboard.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Dashboard')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_dash">
            <img class="logotitulo-dash" src="{{ asset('images/logo-cabecera_dashboard.svg') }}" alt="Logo">

            {{-- Menú hamburguesa --}}
            @include('includes.burger-menu')
        </section>
    </header>

    {{-- ----------------- --}}
    {{-- Contenedor del mensaje de éxito --}}
    {{-- ----------------- --}}
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            <ul>
                <li>{{ session('success') }}</li>
            </ul>
        </div>
    @endif

    {{-- ----------------- --}}
    {{-- Contenido del Dashboard --}}
    {{-- ----------------- --}}
    <section class="contenedor_modulos_dash">
        {{-- Módulo Usuarios --}}
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <img src="{{ asset('images/ico-menu-user-dash.png') }}" alt="Ícono de usuarios" class="img-contenedor-dash">
                <div class="texto-contenedor-dash">
                    <div class="titulo_modulo">
                        <p>module</p>
                    </div>
                    <div class="parrafo_modulo">
                        <h3>Users</h3>
                    </div>
                </div>
                <div class="boton_view_dash">
                    <a href="{{ url('users') }}" class="btn btn-explore">
                        <img class="content-btn-view-dash" src="{{ asset('images/btn-view-dash.png') }}" alt="Ver usuarios">
                    </a>
                </div>
            </section>
        </section>

        {{-- Módulo Categorías --}}
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <img src="{{ asset('images/ico-menu-cat-dash.png') }}" alt="Ícono de categorías" class="img-contenedor-dash">
                <div class="texto-contenedor-dash">
                    <div class="titulo_modulo">
                        <p>module</p>
                    </div>
                    <div class="parrafo_modulo">
                        <h3>Categories</h3>
                    </div>
                </div>
                <div class="boton_view_dash">
                    <a href="{{ url('categories') }}" class="btn btn-explore">
                        <img class="content-btn-view-dash" src="{{ asset('images/btn-view-dash.png') }}" alt="Ver categorías">
                    </a>
                </div>
            </section>
        </section>

        {{-- Módulo Juegos --}}
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <img src="{{ asset('images/ico-menu-games-dash.png') }}" alt="Ícono de juegos" class="img-contenedor-dash">
                <div class="texto-contenedor-dash">
                    <div class="titulo_modulo">
                        <p>module</p>
                    </div>
                    <div class="parrafo_modulo">
                        <h3>Games</h3>
                    </div>
                </div>
                <div class="boton_view_dash">
                    <a href="{{ url('games') }}" class="btn btn-explore">
                        <img class="content-btn-view-dash" src="{{ asset('images/btn-view-dash.png') }}" alt="Ver juegos">
                    </a>
                </div>
            </section>
        </section>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Dashboard page loaded');

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

        // Mostrar y ocultar el mensaje de éxito de manera suave
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.opacity = 0;
                }, 3000);
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3500);
            }
        });
    </script>
@endsection
