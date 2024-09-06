{{-- Ubicación: gameapp/resources/views/games/delete.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Delete Game')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_gamer">
            <a href="{{ route('collection.index') }}">
                <img class="icoback-gamer" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-gamer" src="{{ asset('images/logo-cabecera_games.svg') }}" alt="Logo">
        </section>
    </header>

    <section class="scroll">
        <div class="container disable-container">
            <h2>Eliminar Juego</h2>
            <p>¿Estás seguro de que deseas eliminar este juego?</p>
            <p>
                Título: <span class="highlight">{{ $game->title }}</span>
                Desarrollador: <span class="highlight">{{ $game->developer }}</span>.
            </p>
            <p>
                Este juego fue creado por el administrador: <span class="highlight">{{ $game->user->fullname ?? 'N/A' }}</span>.
            </p>

            <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-status">Eliminar</button>
                <a href="{{ route('collection.index') }}" class="btn btn-secondary-status">Cancelar</a>
            </form>
        </div>
    </section>

@endsection
