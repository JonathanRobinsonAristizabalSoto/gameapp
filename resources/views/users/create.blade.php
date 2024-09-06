{{-- gameapp/resources/views/auth/create.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Create')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_add">
            <div>
                <a href="{{ url('users') }}">
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
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="contenedor_titulos_cajas_register">
            @csrf
            <div id="imagenContenedor">
                <div id="uploadText">
                    <p>Upload Photo</p>
                </div>
                <img class="img_perfil_usuario" src="{{ asset('images/transparent.png') }}" alt="User Profile Image">
                <input type="file" id="inputFile" name="photo" accept="image/*">
            </div>

            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Document</h3>
                </label>
                <div class="caja">
                    <input type="text" name="document" placeholder="Ingrese su documento" value="{{ old('document') }}" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Fullname</h3>
                </label>
                <div class="caja">
                    <input type="text" name="fullname" placeholder="Ingrese su nombre" value="{{ old('fullname') }}"
                        required>
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
                                {{ old('gender') == 'male' ? 'checked' : '' }} required>
                            <span>Male</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="gender" value="female"
                                {{ old('gender') == 'female' ? 'checked' : '' }}>
                            <span>Female</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="gender" value="other"
                                {{ old('gender') == 'other' ? 'checked' : '' }}>
                            <span>Other</span>
                        </label>
                    </div>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Email</h3>
                </label>
                <div class="caja">
                    <input type="email" name="email" placeholder="Ingrese su email" value="{{ old('email') }}"
                        required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Phone</h3>
                </label>
                <div class="caja">
                    <input type="tel" name="phone" placeholder="Ingrese su teléfono" value="{{ old('phone') }}"
                        required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Birthdate</h3>
                </label>
                <div class="caja">
                    <input type="date" name="birthdate" value="{{ old('birthdate') }}" required>
                </div>
            </section>
            {{-- contenedor crear contraseña --}}
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Password</h3>
                </label>
                <div class="caja">
                    <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="Show Password">
                    <input type="password" class="password" name="password" placeholder="Ingrese su contraseña"
                        required>
                </div>
            </section>
            {{-- contenedor confirmar contraseña --}}
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Confirm Password</h3>
                </label>
                <div class="caja">
                    <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="Show Password">
                    <input type="password" class="password" name="password_confirmation"
                        placeholder="Confirme su contraseña" required>
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
            {{-- boton de registro --}}
            <div class="botonregister">
                <button type="submit" class="btn btn-explore">
                    <img class="content-btn2-footer" src="{{ asset('images/content-btn-add.svg') }}"
                        alt="Explore">
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

    <script>
        // Mostrar/ocultar contraseña
        document.querySelectorAll('.ico-eye').forEach(eyeIcon => {
            eyeIcon.addEventListener('click', function() {
                const passwordInput = this.nextElementSibling;
                const isPasswordVisible = passwordInput.type === 'password';
                passwordInput.type = isPasswordVisible ? 'text' : 'password';
                this.src = isPasswordVisible ? '{{ asset('images/ico-eye-closed.svg') }}' :
                    '{{ asset('images/ico-eye.svg') }}';
            });
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
    <script>
        // Evento click para el botón de login en el menú hamburguesa
        $('.btn-login').on('click', function(event) {
            event.preventDefault();
            $('#page-content').fadeOut(400, function() {
                $('#loader').fadeIn(300, function() {
                    setTimeout(function() {
                        $('#loader').fadeOut(300, function() {
                            window.location.href =
                                "{{ url('login') }}";
                        });
                    }, 300);
                });
            });
        });

        // Evento click para el botón de catálogo en el menú hamburguesa
        $('.btn-catalogue').on('click', function(event) {
            event.preventDefault();
            $('#page-content').fadeOut(400, function() {
                $('#loader').fadeIn(300, function() {
                    setTimeout(function() {
                        $('#loader').fadeOut(300, function() {
                            window.location.href =
                                "{{ url('catalogue') }}";
                        });
                    }, 300);
                });
            });
        });
    </script>
@endsection
