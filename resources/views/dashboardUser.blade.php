{{-- Ubicación: gameapp/resources/views/dashboardUser.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Dashboard User')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_mydash">
            <img class="logotitulo-mydash" src="{{ asset('images/logotitulo-mydash.svg') }}" alt="Logo">

            {{-- Menú hamburguesa --}}
            @include('includes.burger-menu-user')
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
        {{-- Módulo Mi Perfil --}}
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <img src="{{ asset('images/ico-myprofile.png') }}" alt="Ícono de mi perfil" class="img-contenedor-dash">
                <div class="texto-contenedor-dash">
                    <div class="parrafo_modulo">
                        <h3>My Profile</h3>
                    </div>
                </div>
                <div class="boton_view_dash">
                    <a href="{{ url('profile') }}" class="btn btn-explore">
                        <img class="content-btn-view-dash" src="{{ asset('images/btn-view-dash.png') }}" alt="Ver mi perfil">
                    </a>
                </div>
            </section>
        </section>

        {{-- Módulo Colección --}}
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <img src="{{ asset('images/ico-mycollection.png') }}" alt="Ícono de colección" class="img-contenedor-dash">
                <div class="texto-contenedor-dash">
                    <div class="parrafo_modulo">
                        <h3>My collection</h3>
                    </div>
                </div>
                <div class="boton_view_dash">
                    <a href="{{ url('collection') }}" class="btn btn-explore">
                        <img class="content-btn-view-dash" src="{{ asset('images/btn-view-dash.png') }}" alt="Ver colección">
                    </a>
                </div>
            </section>
        </section>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Dashboard User page loaded');

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
