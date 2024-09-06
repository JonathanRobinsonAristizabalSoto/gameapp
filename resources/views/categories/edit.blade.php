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
            <div id="imagenContenedor">
                <div id="uploadText">
                    <p>Upload Category</p>
                </div>
                <img class="img_perfil_usuario" src="{{ asset('images/transparent.png') }}" alt="Category Image">
                <input type="file" id="inputFile" name="image" accept="image/*">
            </div>
            @method('PATCH')
            <div class="caja">
                <input type="text" name="name" value="{{ $category->name }}" placeholder="Name">
            </div>
            <div class="caja">
                <input type="text" name="manufacturer" value="{{ $category->manufacturer }}" placeholder="Manufacturer">
            </div>
            <div class="caja">
                <input type="date" name="releasedate" value="{{ $category->releasedate }}" placeholder="Release Date">
            </div>
            <div class="caja">
                <textarea name="description" placeholder="Enter description, max 30 words">{{ $category->description }}</textarea>
            </div>
            <div class="botonuser">
                <button type="submit">Update</button>
            </div>
        </form>
    </section>
    <script>
        document.querySelector('.inputfile').addEventListener('change', function(e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : 'No se ha seleccionado ningún archivo';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
@endsection
@section('js')

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
