{{-- Ubicación del archivo: gameapp/resources/views/users/partials/user_list.blade.php --}}

<section class="contenedor_modulos_dash">
    @foreach ($users as $user)
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <!-- Contenedor para la imagen de perfil en miniatura -->
                <div class="img_perfil_miniatura">
                    <img class="img_perfil_usuario_miniatura"
                        src="{{ $user->photo ? asset('images/' . $user->photo) : asset('images/no-photo.png') }}"
                        alt="User Thumbnail">
                </div>
                <!-- Texto del contenedor de usuario -->
                <div class="texto-contenedor-dash">
                    <div class="titulo_modulo">
                        <h4>{{ $user->fullname }}</h4>
                    </div>
                    <div class="parrafo_modulo">
                        <p>{{ $user->role }}</p>
                    </div>
                </div>
                <!-- Botón para ver editar e inabilitar usuarios -->
                <div class="contenedor-status {{ $user->status ? 'activo' : 'inactivo' }}">
                    <p>{{ $user->status ? 'Activo' : 'Inactivo' }}</p> <!-- Estado del usuario -->
                </div>

                <div class="boton_view_dash">
                    <!-- Botón de ver -->
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-explore">
                        <i class="fa-regular fa-eye icon-white icon-thin"></i>
                    </a>
                    <!-- Botón de editar -->
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">
                        <i class="fa-regular fa-pen-to-square icon-white icon-thin"></i>
                        <!-- Icono de editar -->
                    </a>
                    <!-- Botón de deshabilitar usuario -->
                    <a href="{{ route('users.disable', $user->id) }}" class="btn btn-status">
                        <i class="fa-solid fa-user-slash icon-white icon-thin"></i>
                        <!-- Icono de deshabilitar -->
                    </a>
                </div>
            </section>
        </section>
    @endforeach
</section>
