@extends('layouts.plantilla2')

@section('title', 'Games Module')
@section('class', 'cuerpo')

@section('content')
    <!-- cabecera -->
    <header>
        <section class="cabecera_gamer">
            <a href="{{ route('dashboard') }}">
                <img class="icoback-gamer" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-gamers" src="{{ asset('images/logo-cabecera_games.svg') }}" alt="Logo">

            <!-- Incluir Menú hamburguesa -->
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">

        <!-- Mensajes de éxito y error -->
        @if (session('success'))
            <div class="alert alert-success" id="success-message"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px; display: none;">
                {{ session('success') }}
            </div>
        @endif

        <!-- caja de busqueda -->
        <div class="search-box">
            <input type="text" id="qsearch" placeholder="Buscar">
            <i class="fas fa-filter filter-icon"></i>
        </div>

        <!-- boton de exportar pdf -->
        <div class="export-buttons">
            <!-- boton add -->
            <div class="botonadd">
                <form action="{{ route('games.create') }}">
                    <button class="btn-add" type="submit">
                        <i class="fas fa-plus icon-white icon-thin"></i> <!-- Icono de añadir -->
                    </button>
                </form>
            </div>
            <!-- boton export pdf -->
            <form action="{{ route('games.export.pdf') }}" method="GET">
                <button class="btn-export" type="submit" style="background: none; border: none;">
                    <img src="{{ asset('images/btnpdf.svg') }}" alt="Exportar a PDF" style="width: 32px; height: 32px;">
                </button>
            </form>
            <!-- boton export excel -->
            <form action="{{ route('games.export.excel') }}" method="GET">
                <button class="btn-export" type="submit" style="background: none; border: none;">
                    <img src="{{ asset('images/btnexcel.svg') }}" alt="Exportar a Excel" style="width: 32px; height: 32px;">
                </button>
            </form>
        </div>

        <!-- botones de importar -->
        <!-- Ruta del archivo: resources/views/import.blade.php -->
        <div class="import-buttons">
            <form id="import-form" action="{{ route('games.import.excel') }}" method="POST" enctype="multipart/form-data">
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


        <!-- contenido games -->
        <section class="contenedor_modulos_dash" id="list">
            @include('games.partials.game_list', ['games' => $games])
        </section>
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
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active');
            $('.nav').toggleClass('active');
            $('.contenido_menu').toggleClass('oculto');
        });

        // Script para búsqueda en tiempo real
        $(document).ready(function() {
            $('body').on('keyup', '#qsearch', function(e) {
                e.preventDefault();
                var query = $(this).val();
                var token = '{{ csrf_token() }}';

                if (query === '') {
                    // Si el campo de búsqueda está vacío, recargar todos los juegos
                    $.ajax({
                        url: '{{ route('games.index') }}',
                        method: 'GET',
                        success: function(data) {
                            $('#list').html($(data).find('#list').html());
                        }
                    });
                } else {
                    // Si hay una consulta, realizar la búsqueda
                    $.ajax({
                        url: '{{ route('games.search') }}',
                        method: 'POST',
                        data: {
                            query: query,
                            _token: token
                        },
                        success: function(data) {
                            $('#list').html(data.html);
                        }
                    });
                }
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
