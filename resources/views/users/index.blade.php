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

        <!-- Mostrar mensaje de error -->
        @if (session('error'))
            <div class="alert alert-danger" id="error-message"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px; display: none;">
                {{ session('error') }}
            </div>
        @endif

        <!-- Mostrar mensajes de validación de errores -->
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

        <!-- Sección de lista de usuarios -->

        <!-- boton de exportar pdf -->
        <div class="export-buttons">
            <!-- boton add -->
            <div class="botonadd">
                <form action="{{ route('users.create') }}">
                    <button class="btn-add" type="submit">
                        <i class="fas fa-plus icon-white icon-thin"></i>
                    </button>
                </form>
            </div>
            <!-- boton export pdf -->
            <form action="{{ route('users.export.pdf') }}" method="GET">
                <button class="btn-export" type="submit" style="background: none; border: none;">
                    <img src="{{ asset('images/btnpdf.svg') }}" alt="Exportar a PDF" style="width: 32px; height: 32px;">
                </button>
            </form>
            <!-- boton export excel -->
            <form action="{{ route('users.export.excel') }}" method="GET">
                <button class="btn-export" type="submit" style="background: none; border: none;">
                    <img src="{{ asset('images/btnexcel.svg') }}" alt="Exportar a Excel" style="width: 32px; height: 32px;">
                </button>
            </form>
        </div>

        <!-- botones de importar -->
        <div class="import-buttons">
            <form id="import-form" action="{{ route('users.import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input de archivo -->
                <input type="file" name="file" id="file-upload" accept=".xlsx, .xls" required>

                <!-- Etiqueta personalizada para el input -->
                <label for="file-upload" class="btn-import">
                    <img src="{{ asset('images/btnimport.svg') }}" alt="Importar desde Excel" class="import-icon">
                    Importar
                </label>

                <div id="file-info" style="display: none;">
                    <span id="file-name"></span>
                    <button type="submit" class="btn-confirm-import">Confirmar</button>
                </div>
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
        document.getElementById('file-upload').addEventListener('change', function(event) {
            var fileName = event.target.files[0].name;
            document.getElementById('file-name').textContent = fileName;
            document.getElementById('file-info').style.display = 'block';
        });
    </script>
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