{{-- Ubicación del archivo: resources/views/collection/partials/collection_list.blade.php --}}

<section class="contenedor_modulos_dash">
    @foreach ($categories as $categoryName => $games)
        <h3 class="titulo-categoria-mycollection">{{ $categoryName }}</h3>
        <section class="contenedor_dash">
            @foreach ($games as $game)
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
                            <p>{{ $game->genre }}</p>
                        </div>
                    </div>
                    <div class="boton_view_dash">
                        <!-- Botón de ver -->
                        <a href="{{ route('collection.show', $game->id) }}" class="btn btn-explore" aria-label="View {{ $game->title }}">
                            <i class="fa-regular fa-eye icon-white icon-thin"></i>
                        </a>

                        <!-- Botón de eliminar -->
                        <a href="{{ route('collection.delete', $game->id) }}" class="btn btn-delete" aria-label="Delete {{ $game->title }}">
                            <i class="fa-regular fa-trash-can icon-white icon-thin"></i>
                        </a>
                    </div>
                </section>
            @endforeach
        </section>
    @endforeach
</section>