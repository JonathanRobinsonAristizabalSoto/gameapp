<!-- resources/views/includes/burger-menu.blade.php -->
<div class="burger-menu">
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
    <!-- Navegación del menú hamburguesa -->
    <nav class="nav">
        <section class="contenedor_titulos_myprofile2">
            {{-- Foto del usuario --}}
            <div class="img_perfiles">
                <img class="img_perfil_usuario"
                    src="{{ Auth::user()->photo ? asset('images/' . Auth::user()->photo) : asset('images/no-photo.png') }}"
                    alt="Profile Image">
            </div>
            {{-- Datos del usuario --}}
            <section>
                <div>
                    {{-- Nombre del usuario --}}
                    <div class="titulo_myprofile">
                        <p>{{ Auth::user()->fullname }}</p>
                        <!-- Muestra el nombre del usuario autenticado -->
                    </div>
                    {{-- Rol del usuario --}}
                    <div class="boton_role"> <!-- Muestra el rol del usuario autenticado -->
                        <div>
                            <p>{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                    {{-- Estado del usuario --}}
                    <div class="status_dash"> <!-- Muestra el estado del usuario autenticado -->
                        <div>
                            <p>{{ Auth::user()->status ? ' Activo' : ' Inactivo' }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Menú de navegación del perfil -->
            <menu class="contenedor_titulo_myprofile">
                <a href="{{ route('profile.index') }}">
                    <img src="{{ asset('images/ico-profyle.png') }}" alt="Profile Icon">
                    My Profile
                </a>
                <hr>
                <a href="{{ route('dashboard.user') }}">
                    <img src="{{ asset('images/ico-conf.png') }}" alt="Dashboard User Icon">
                My Dashboard
                </a>
                <hr>
                <a href="{{ route('catalogue') }}">
                    <img src="{{ asset('images/ico-menu-catalogue.png') }}" alt="Catalogue Icon">
                    Catalogue
                </a>
                <hr>
                <!-- Formulario para cerrar sesión -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="{{ asset('images/ico-logout.png') }}" alt="Log Out Icon">
                    LogOut
                </a>
                <hr>
            </menu>
        </section>
    </nav>
</div>
