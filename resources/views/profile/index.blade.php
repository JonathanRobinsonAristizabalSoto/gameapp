{{-- Ubicación del archivo: gameapp/resources/views/profile/index.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Profile')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_users">
            <a href="{{ url('users') }}">
                <img class="icoback-users" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-profile" src="{{ asset('images/logotitulo-profile.svg') }}" alt="Logo">
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">
        <div class="contenedor-show">
            {{-- Foto del usuario --}}
            <div class="img_perfiles">
                <img class="img_perfil_usuario"
                    src="{{ Auth::user()->photo ? asset('images/' . Auth::user()->photo) : asset('images/no-photo.png') }}"
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
        {{-- Botón para editar el usuario --}}
        <div class="subcontenedor_edit">
            <a href="{{ url('profile/edit') }}" class="btn-edit">
                <button type="button" class="btn-edit-button">
                    <i class="fa-regular fa-pen-to-square"></i>
                </button>
            </a>
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
