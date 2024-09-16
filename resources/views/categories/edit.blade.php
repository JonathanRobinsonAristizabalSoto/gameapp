{{-- Ubicación: gameapp/resources/views/categories/edit.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Edit Category')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_categories">
            <a href="{{ route('categories.index') }}">
                <img class="icoback-dash" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-edit" src="{{ asset('images/logo-edit.svg') }}" alt="Logo">
        </section>
    </header>

    <section class="scroll">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            {{-- Imagen de la categoría --}}
            <div id="imagenContenedor">
                <div id="uploadText">
                    <p>Upload Category Image</p>
                </div>
                <img class="img_perfil_usuario" src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/transparent.png') }}" alt="Category Image">
                <input type="file" id="inputFile" name="image" accept="image/*">
            </div>

            {{-- Campos del formulario --}}
            <div class="caja">
                <input type="text" name="name" value="{{ old('name', $category->name) }}" placeholder="Name">
            </div>
            <div class="caja">
                <input type="text" name="manufacturer" value="{{ old('manufacturer', $category->manufacturer) }}" placeholder="Manufacturer">
            </div>
            <div class="caja">
                <input type="date" name="releasedate" value="{{ old('releasedate', $category->releasedate) }}" placeholder="Release Date">
            </div>
            <div class="caja">
                <textarea name="description" placeholder="Enter description, max 30 words">{{ old('description', $category->description) }}</textarea>
            </div>
            <div class="botonuser">
                <button type="submit">Update</button>
            </div>
        </form>
    </section>

    {{-- Scripts --}}
    @section('js')
        {{-- Script para cargar la imagen previa --}}
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

                // Permitir al usuario seleccionar una imagen al hacer clic en el contenedor
                $('#imagenContenedor').click(function() {
                    $('#inputFile').click();
                });
            });
        </script>

        {{-- Mostrar errores con SweetAlert2 --}}
        <script>
            @if ($errors->any())
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
@endsection
