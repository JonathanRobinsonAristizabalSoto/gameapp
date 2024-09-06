{{-- Ubicación: gameapp/resources/views/categories/create.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Create Category')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_add">
            <div>
                <a href="{{ route('categories.index') }}">
                    <img class="icoback-add" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                </a>
                <img class="logotitulo-add" src="{{ asset('images/logo-cabecera_add.svg') }}" alt="Logo">
            </div>
            <!-- Menú hamburguesa -->
            @include('includes.burger-menu')
        </section>
    </header>

    <!-- Registro -->
    <section class="scroll">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="contenedor_titulos_cajas_register">
            @csrf
            <div id="imagenContenedor">
                <div id="uploadText">
                    <p>Upload Category</p>
                </div>
                <img class="img_perfil_usuario" src="{{ asset('images/transparent.png') }}" alt="Category Image">
                <input type="file" id="inputFile" name="image" accept="image/*">
            </div>

            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Category Name</h3>
                </label>
                <div class="caja">
                    <input type="text" name="name" placeholder="Enter category name"
                        value="{{ old('name') }}" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Manufacturer</h3>
                </label>
                <div class="caja">
                    <input type="text" name="manufacturer" placeholder="Enter manufacturer" value="{{ old('manufacturer') }}" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Release Date</h3>
                </label>
                <div class="caja">
                    <input type="date" name="releasedate" placeholder="Enter release date" value="{{ old('releasedate') }}" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Description:</h3>
                </label>
                <div class="caja">
                    <textarea name="description" placeholder="Enter description, max 30 words">{{ old('description') }}</textarea>
                </div>
            </section>
            {{-- boton de registro --}}
            <div class="botonregister">
                <button type="submit" class="btn btn-explore">
                    <img class="content-btn2-footer" src="{{ asset('images/content-btn-add.svg') }}"
                        alt="Add Category">
                </button>
            </div>
        </form>
    </section>
@endsection

@section('js')
    {{-- script menu hamburguesa --}}
    <script>
        // Ocultar todo el contenido y luego mostrarlo suavemente
        $('#page-content').hide().fadeIn(400);
    </script>
    <script>
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active');
            $('.nav').toggleClass('active');
            $('.contenido_menu').toggleClass('oculto');
        });
    </script>

    {{-- script photo upload --}}
    <script>
        $(document).ready(function() {
            $('#inputFile').on('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#imagenContenedor').find('img').attr('src', event.target.result);
                    $('#uploadText').hide();
                }
                reader.readAsDataURL(file);
            });

            // Permitir al usuario seleccionar una imagen al hacer clic en cualquier parte del contenedor
            $('#imagenContenedor').click(function() {
                $('#inputFile').click();
            });
        });
    </script>

    {{-- Display errors with SweetAlert2 --}}
    <script>
        @if (count($errors) > 0)
            let errorHtml = '';
            @foreach ($errors->all() as $error)
                errorHtml += '<li>{{ $error }}</li>';
            @endforeach
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: '<ul>' + errorHtml + '</ul>',
                showConfirmButton: false,
                timer: 4000
            });
        @endif
    </script>
@endsection
