{{-- Ubicación: gameapp/resources/views/categories/delete.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Delete Category')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_categories">
            <a href="{{ route('categories.index') }}">
                <img class="icoback-dash" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-delete" src="{{ asset('images/logotitulo-delete.svg') }}" alt="Logo">
        </section>
    </header>

    <section class="scroll">
        <div class="container disable-container">
            <h2>Eliminar Categoria</h2>
            <p>¿Estás seguro de que deseas eliminar esta categoría?</p>
            <p>
                Nombre: <span class="highlight">{{ $category->name }}</span>
                Fabricante: <span class="highlight">{{ $category->manufacturer }}</span>.
            </p>
            <p>
                Esta categoría fue creada por el administrador: <span class="highlight">{{ $category->games->first()->user->fullname ?? 'N/A' }}</span>.
            </p>

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-status">Eliminar</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary-status">Cancelar</a>
            </form>
        </div>
    </section>

@endsection
