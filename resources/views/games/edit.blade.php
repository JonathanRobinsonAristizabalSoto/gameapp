{{-- Ubicación: gameapp/resources/views/games/edit.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Edit Game')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_gamer">
            <a href="{{ route('games.index') }}">
                <img class="icoback-gamer" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-edit" src="{{ asset('images/logo-edit.svg') }}" alt="Logo">
        </section>
    </header>

    <section class="scroll">
        <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="imagenContenedor">
                <div id="uploadText">
                    <p>Upload Game Image</p>
                </div>
                <img class="img_perfil_usuario" src="{{ $game->image ? asset('storage/' . $game->image) : asset('images/transparent.png') }}" alt="Game Image">
                <input type="file" id="inputFile" name="image" accept="image/*">
            </div>
            @method('PATCH')
            <div class="caja">
                <input type="text" name="title" value="{{ $game->title }}" placeholder="Title">
            </div>
            <div class="caja">
                <input type="text" name="developer" value="{{ $game->developer }}" placeholder="Developer">
            </div>
            <div class="caja">
                <input type="date" name="releasedate" value="{{ $game->releasedate }}" placeholder="Release Date">
            </div>
            <div class="caja">
                <input type="number" name="price" value="{{ $game->price }}" placeholder="Price">
            </div>
            <div class="caja">
                <input type="text" name="genre" value="{{ $game->genre }}" placeholder="Genre">
            </div>
            <div class="caja">
                <textarea name="description" placeholder="Enter description, max 30 words">{{ $game->description }}</textarea>
            </div>
            <div class="botonuser">
                <button type="submit">Update</button>
            </div>
        </form>
    </section>
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
