{{-- Ubicación del archivo: gameapp/resources/views/profile/edit.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Editar Usuario')
@section('class', 'cuerpo')

@section('content')
    <!-- Encabezado principal de la página -->
    <header>
        <section class="cabecera_users">
            <!-- Botón de retroceso -->
            <a href="{{ url('users') }}">
                <img class="icoback-users" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <!-- Logo del encabezado -->
            <img class="logotitulo-edit-profile" src="{{ asset('images/logotitulo-edit-profile.svg') }}" alt="Logo">

            <!-- Incluir Menú hamburguesa -->
            @include('includes.burger-menu')
        </section>
    </header>

    <section class="scroll">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
            class="contenedor_titulos_cajas_register">
            @csrf
            @method('PATCH')
            <div id="imagenContenedor">
                <div id="uploadText">
                    <p>Upload Photo</p>
                </div>
                <img class="img_perfil_usuario" src="{{ asset('images/transparent.png') }}" alt="User Profile Image">
                <input type="file" id="inputFile" name="photo" accept="image/*">
            </div>

            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Full Name</h3>
                </label>
                <div class="caja">
                    <input type="text" name="fullname" id="fullname" placeholder="Ingrese su nombre"
                        value="{{ $user->fullname }}" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Email</h3>
                </label>
                <div class="caja">
                    <input type="email" name="email" id="email" placeholder="Ingrese su email"
                        value="{{ $user->email }}" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Role</h3>
                </label>
                <div class="caja">
                    <input type="text" name="role" id="role" placeholder="Ingrese su rol"
                        value="{{ $user->role }}" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Phone</h3>
                </label>
                <div class="caja">
                    <input type="text" name="phone" id="phone" placeholder="Ingrese su teléfono"
                        value="{{ $user->phone }}" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Gender</h3>
                </label>
                <div class="caja">
                    <div class="caja-radio">
                        <label class="radio-option">
                            <input type="radio" name="gender" value="male"
                                {{ $user->gender == 'male' ? 'checked' : '' }} required>
                            <span>Male</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="gender" value="female"
                                {{ $user->gender == 'female' ? 'checked' : '' }}>
                            <span>Female</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="gender" value="other"
                                {{ $user->gender == 'other' ? 'checked' : '' }}>
                            <span>Other</span>
                        </label>
                    </div>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Birthdate</h3>
                </label>
                <div class="caja">
                    <input type="date" name="birthdate" id="birthdate" placeholder="Ingrese su fecha de nacimiento"
                        value="{{ $user->birthdate }}" required>
                </div>
            </section>
            {{-- contenedor de role --}}
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Role</h3>
                </label>
                <div class="caja_role">
                    <select name="role" required>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="moderator" {{ old('role') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
            </section>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="botonregister">
                <button type="submit" class="btn btn-explore">
                    <img class="content-btn2-footer" src="{{ asset('images/content-btn-view-edit.svg') }}" alt="Update">
                </button>
            </div>
        </form>
    </section>
@endsection

@section('js')
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
