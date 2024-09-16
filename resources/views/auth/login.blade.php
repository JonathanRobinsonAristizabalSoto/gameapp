{{-- Ubicación: gameapp/resources/views/auth/login.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Login')
@section('class', 'cuerpo')

@section('content')
    {{-- ----------------- --}}
    {{-- Loader oculto --}}
    {{-- ----------------- --}}
    <div id="loader" class="loader" style="display: none;"></div>

    {{-- ----------------- --}}
    {{-- Contenido principal oculto --}}
    {{-- ----------------- --}}
    <div id="page-content" style="display: none;">

        {{-- ----------------- --}}
        {{-- Cabecera con logo y botón de regreso --}}
        {{-- ----------------- --}}
        <header>
            <section class="cabecera_login">
                <a href="{{ url('catalogue') }}">
                    <img class="icoback-login" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                </a>
                <img class="logotitulo-login" src="{{ asset('images/logo-cabecera_login.svg') }}" alt="Logo">

                {{-- Menú hamburguesa --}}
                @include('includes.burger-menu-login')
            </section>
        </header>

        {{-- ----------------- --}}
        {{-- Mostrar mensaje de error --}}
        {{-- ----------------- --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ----------------- --}}
        {{-- Formulario de inicio de sesión --}}
        {{-- ----------------- --}}
        <section id="login-content" class="scroll">
            <form action="{{ route('login') }}" method="POST" class="contenedor_titulos_cajas_login">
                @csrf
                <div class="contenedor_titulo_caja_login">
                    <label class="titulo_login">
                        <img src="{{ asset('images/ico-email.png') }}" alt="Email Icon">
                        <h3>Email</h3>
                    </label>
                    <div class="caja">
                        <input type="email" name="email" placeholder="Ingrese su email" value="{{ old('email') }}"
                            required>
                    </div>
                </div>
                <div class="contenedor_titulo_caja_login">
                    <label class="titulo_login">
                        <img src="{{ asset('images/ico-password.png') }}" alt="Password Icon">
                        <h3>Password</h3>
                    </label>
                    <div class="caja">
                        <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="Show Password">
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>
                </div>

                {{-- ----------------- --}}
                {{-- Sección recordar contraseña --}}
                {{-- ----------------- --}}
                <section class="contenedor_recordar">
                    <label class="titulo_recordar">
                        <p>Remember Me</p>
                    </label>
                    <div class="caja_recordar">
                        <input type="checkbox" class="checkbox_recordar" name="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                    </div>
                </section>

                {{-- ----------------- --}}
                {{-- Botón de inicio de sesión --}}
                {{-- ----------------- --}}
                <footer>
                    <div class="botonlogin">
                        <button type="submit" class="btn btn-explore">
                            <img class="content-btn2-footer" src="{{ asset('images/content-btn2-footer.svg') }}"
                                alt="Login">
                        </button>
                        <a class="recordar_contraseña" href="#">Forgot your password?</a>
                    </div>
                </footer>
            </form>
        </section>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Login page loaded');

            // Mostrar contenido principal con animación
            $('#page-content').hide().fadeIn(400);

            // Menú hamburguesa
            const burgerButton = document.querySelector('.btn-burger');
            const nav = document.querySelector('.nav');
            const menu = document.querySelector('.contenido_menu');

            burgerButton.addEventListener('click', function() {
                burgerButton.classList.toggle('active');
                nav.classList.toggle('active');
                menu.classList.toggle('oculto');
            });

            // Mostrar/ocultar contraseña
            let togglePass = false;
            document.querySelector('.ico-eye').addEventListener('click', function() {
                const passwordInput = this.nextElementSibling;
                togglePass = !togglePass;
                passwordInput.type = togglePass ? 'text' : 'password';
                this.src = togglePass ? '{{ asset('images/ico-eye-closed.svg') }}' :
                    '{{ asset('images/ico-eye.svg') }}';
            });
        });

        // Navegación con botones
        $('.btn-register').on('click', function(event) {
            event.preventDefault();
            console.log('Register button clicked');
            $('#page-content').fadeOut(400, function() {
                $('#loader').fadeIn(300, function() {
                    setTimeout(function() {
                        $('#loader').fadeOut(300, function() {
                            window.location.href = "{{ url('register') }}";
                        });
                    }, 300);
                });
            });
        });

        $('.btn-catalogue').on('click', function(event) {
            event.preventDefault();
            console.log('Catalogue button clicked');
            $('#page-content').fadeOut(400, function() {
                $('#loader').fadeIn(300, function() {
                    setTimeout(function() {
                        $('#loader').fadeOut(300, function() {
                            window.location.href = "{{ url('catalogue') }}";
                        });
                    }, 300);
                });
            });
        });
    </script>
@endsection
