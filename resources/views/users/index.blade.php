{{-- Ubicación del archivo: gameapp/resources/views/users/index.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Users Module')
@section('class', 'cuerpo')

@section('content')
    <!-- Encabezado principal de la página -->
    <header>
        <section class="cabecera_users">
            <!-- Botón de retroceso -->
            <a href="{{ url('dashboard') }}">
                <img class="icoback-users" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <!-- Logo del encabezado -->
            <img class="logotitulo-users" src="{{ asset('images/logo-cabecera_users.svg') }}" alt="Logo">

            <!-- Incluir Menú hamburguesa -->
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">
        <!-- Mostrar mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success" id="success-message"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px; display: none;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Caja de búsqueda -->
        <div class="search-box">
            <input id="qsearch" type="text" placeholder="Buscar">
            <i class="fas fa-filter filter-icon"></i>
        </div>

        <!-- Sección de lista de usuarios -->

        <!-- Botón para agregar un nuevo usuario -->
        <div class="botonuser">
            <form action="{{ url('users/create') }}">
                <button class="btn-user" type="submit">
                    <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add User">
                </button>
            </form>
        </div>

        <!-- Lista de usuarios -->
        <div id="list">
            @include('users.partials.user_list', ['users' => $users])
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

        // Script para búsqueda en tiempo real
        $(document).ready(function() {
            $('body').on('keyup', '#qsearch', function(e) {
                e.preventDefault();
                var query = $(this).val();
                var token = '{{ csrf_token() }}';

                $.ajax({
                    url: '{{ route('users.search') }}',
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
            $('#success-message').fadeIn('slow', function() {
                setTimeout(function() {
                    $('#success-message').fadeOut('slow');
                }, 3000);
            });
        });
    </script>
@endsection
