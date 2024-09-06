{{-- Ubicación del archivo: gameapp/resources/views/users/disable.blade.php --}}

@extends('layouts.plantilla2')

@section('title', $user->status ? 'Deshabilitar Usuario' : 'Habilitar Usuario')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_users">
            <a href="{{ url('users') }}">
                <img class="icoback-users" src="{{ asset('images/btn_back.png') }}" alt="Botón de Retroceso">
            </a>
            <img class="logotitulo-status" src="{{ asset('images/logo-cabecera_status.svg') }}" alt="Logo">
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">
        <div class="container disable-container">
            <h2>{{ $user->status ? 'Deshabilitar Usuario' : 'Habilitar Usuario' }}</h2>
            <p>¿Estás seguro de que deseas {{ $user->status ? 'deshabilitar' : 'habilitar' }} al usuario
                <strong>{{ $user->fullname }}</strong>?
            </p>
            <p>Esta acción
                {{ $user->status ? 'impedirá que el usuario acceda al sistema' : 'permitirá que el usuario acceda al sistema nuevamente' }}.
            </p>
            <form action="{{ route('users.toggle-status', $user->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-status">{{ $user->status ? 'Deshabilitar' : 'Habilitar' }}</button>
                </div>
            </form>
            <a href="{{ url('users') }}" class="btn btn-secondary-status">Cancelar</a>
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
