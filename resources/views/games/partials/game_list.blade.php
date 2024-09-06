{{-- Ubicación: gameapp/resources/views/games/partials/game_list.blade.php --}}

@foreach ($games as $game)
    <section class="contenedor_dash">
        <section class="contenido_dash">

            <!-- Contenedor para la imagen de games en miniatura -->
            <div class="img_perfil_miniatura">
                <img class="img_perfil_usuario_miniatura"
                    src="{{ $game->image ? asset('images/' . $game->image) : asset('images/no-photo.png') }}"
                    alt="category Thumbnail">
            </div>
            <div class="texto-contenedor-dash">
                <div class="titulo_modulo">
                    <h4>{{ $game->title }}</h4>
                </div>
                <div class="parrafo_modulo">
                    <p>{{ $game->category->manufacturer }}</p>
                </div>
            </div>

            <!-- Botónes para ver editar y borrar games -->
            <div class="boton_view_dash">
                <!-- Botón de ver -->
                <a href="{{ route('games.show', $game->id) }}" class="btn btn-explore">
                    <i class="fa-regular fa-eye icon-white icon-thin"></i>
                </a>
                <!-- Botón de editar -->
                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-edit">
                    <i class="fa-regular fa-pen-to-square icon-white icon-thin"></i> <!-- Icono de editar -->
                </a>
                <!-- Botón de eliminar -->
                <a href="{{ route('games.delete', $game->id) }}" class="btn btn-delete">
                    <i class="fa-regular fa-trash-can icon-white icon-thin"></i></i> <!-- Icono de eliminar -->
                </a>
            </div>
        </section>
    </section>
@endforeach
