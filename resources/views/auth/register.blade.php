{{-- gameapp/resources/views/auth/register.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Register')
@section('class', 'cuerpo')

@section('content')
    <!-- Loader -->
    <div id="loader" class="loader" style="display: none;"></div>
    <!-- Contenedor global para carga suave -->
    <div id="page-content" style="display: none;">
        <!-- Cabecera -->
        <header>
            <section class="cabecera_register">
                <div>
                    <a href="{{ url('catalogue') }}">
                        <img class="icoback" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                    </a>
                    <img class="logotitulo" src="{{ asset('images/logo-cabecera_register.svg') }}" alt="Logo">
                </div>
                <div class="burger-menu">
                    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                        <path class="line top"
                            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                        <path class="line middle" d="m 70,50 h -40" />
                        <path class="line bottom"
                            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
                    </svg>
                    <nav class="nav">
                        <img class="ico-menu-title" src="{{ asset('images/ico-menu-title.svg') }}" alt="Menu">
                        <img class="ico-menu" src="{{ asset('images/ico-menu.png') }}" alt="Icon menu">
                        <menu class="contenido_menu oculto">
                            <a href="{{ url('login') }}" class="btn-login">
                                <img src="{{ asset('images/ico-menu-login.png') }}" alt="Login Icon">
                                Login
                            </a>
                            <hr>
                            <a href="{{ url('catalogue') }}" class="btn-catalogue">
                                <img src="{{ asset('images/ico-menu-catalogue.png') }}" alt="Home Icon">
                                Catalogue
                            </a>
                            <hr>
                        </menu>
                    </nav>
                </div>
            </section>
        </header>
        <section class="scroll">
            {{-- mensaje alerta error --}}
            {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
                class="contenedor_titulos_cajas_register">
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
                        <input type="text" name="document" placeholder="Ingrese su documento"
                            value="{{ old('document') }}" required>
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

                {{-- boton de registro --}}
                <div class="botonregister">
                    <button type="submit" class="btn btn-explore">
                        <img class="content-btn2-footer" src="{{ asset('images/content-btn3-footer.svg') }}"
                            alt="Explore">
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('js')
    {{-- script menu hamburgueza --}}
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
