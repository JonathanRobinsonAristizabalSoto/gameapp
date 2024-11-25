{{-- Ubicación del archivo: gameapp/resources/views/users/show.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Show User')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_users">
            <a href="{{ url('users') }}">
                <img class="icoback-users" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-show" src="{{ asset('images/logo_show.svg') }}" alt="Logo">
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">
        <div class="contenedor-show">
            {{-- Foto del usuario --}}
            <div class="img_perfiles">
                <img class="img_perfil_usuario"
                    src="{{ $user->photo ? asset('images/' . $user->photo) : asset('images/no-photo.png') }}"
                    alt="Profile Image">
            </div>
            {{-- Datos del usuario --}}
            <div class="subcontenedor_show">
                <p class="titulo_fullname">{{ $user->fullname }}</p>
                <p class="titulo_email">{{ $user->email }}</p>
                <p class="titulo_role">{{ $user->role }}</p>
            </div>
            <div class="subcontenedor_show_grill">
                <p>{{ $user->status ? 'Active' : 'Inactive' }}</p>
                <p>{{ $user->document }}</p>
                <p>{{ $user->phone }}</p>
                <p>{{ $user->gender }}</p>
                <p>{{ $user->birthdate }}</p>
                <p>{{ $user->created_at }}</p>
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
