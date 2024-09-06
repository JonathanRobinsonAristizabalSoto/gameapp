{{-- Ubicación: gameapp/resources/views/categories/show.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'View Category')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_categories">
            <a href="{{ route('categories.index') }}">
                <img class="icoback-gamer" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-show" src="{{ asset('images/logo_show.svg') }}" alt="Logo">
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">
        <div class="contenedor-show">
            <div class="img_perfiles">
                <img class="img_perfil_usuario"
                    src="{{ $category->image ? asset('images/' . $category->image) : asset('images/no-photo.png') }}"
                    alt="Category Image">
            </div>
            <h1 class="titulo_viewcategories">{{ $category->name }}</h1>
            <div class="subcontenedor_show_grillcategories">
                <p class="parrafo_view">{{ $category->manufacturer }}</p>
                <p class="parrafo_view">{{ $category->releasedate }}</p>
                <p class="parrafo_view">{{ $category->description }}</p>
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
