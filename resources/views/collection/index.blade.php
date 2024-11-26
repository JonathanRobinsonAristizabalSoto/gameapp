{{-- Ubicación: resources/views/collection/index.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'My Collection')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_mydash">
            <img class="logotitulo-mydash" src="{{ asset('images/logotitulo-mycollection.svg') }}" alt="Logo">

            {{-- Menú hamburguesa --}}
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">
        @if (session('success'))
            <div class="alert alert-success" id="success-message"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px; display: none;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" id="error-message"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px; display: none;">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" id="validation-errors"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px; display: none;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Caja de búsqueda -->
        <div class="search-box">
            <input id="qsearch" type="text" placeholder="Buscar">
            <i class="fas fa-filter filter-icon"></i>
        </div>

        <!-- Lista de colecciones -->
        <div id="list">
            @include('collection.partials.collection_list', ['categories' => $categories])
        </div>
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

        // Script para búsqueda en tiempo real
        $(document).ready(function() {
            $('body').on('keyup', '#qsearch', function(e) {
                e.preventDefault();
                var query = $(this).val();
                var token = '{{ csrf_token() }}';

                $.ajax({
                    url: '{{ route('collection.search') }}',
                    method: 'POST',
                    data: {
                        query: query,
                        _token: token
                    },
                    success: function(data) {
                        $('#list').html(data.html);
                    }
                });
            });

            // Mostrar y ocultar el mensaje de éxito de manera suave
            @if (session('success'))
                $('#success-message').fadeIn('slow', function() {
                    setTimeout(function() {
                        $('#success-message').fadeOut('slow');
                    }, 3000);
                });
            @endif

            // Mostrar y ocultar el mensaje de error de manera suave
            @if (session('error'))
                $('#error-message').fadeIn('slow', function() {
                    setTimeout(function() {
                        $('#error-message').fadeOut('slow');
                    }, 3000);
                });
            @endif

            // Mostrar mensajes de validación de errores de manera suave
            @if ($errors->any())
                $('#validation-errors').fadeIn('slow', function() {
                    setTimeout(function() {
                        $('#validation-errors').fadeOut('slow');
                    }, 4000);
                });
            @endif
        });
    </script>
@endsection