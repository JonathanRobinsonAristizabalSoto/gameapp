{{-- Ubicación del archivo: resources/views/collection/partials/collection_list.blade.php --}}

<section class="contenedor_modulos_dash">
    @foreach ($categories as $categoryName => $games)
        <div class="categoria">
            <h3 class="titulo-categoria-mycollection">{{ $categoryName }}</h3>
            @foreach ($games as $game)
                <section class="contenedor_dash">
                    <section class="contenido_dash">
                        <!-- Contenedor para la imagen de games en miniatura -->
                        <div class="img_perfil_miniatura">
                            <img class="img_perfil_usuario_miniatura"
                                 src="{{ $game->image ? asset('images/' . $game->image) : asset('images/no-photo.png') }}"
                                 alt="Game Thumbnail">
                        </div>
                        <!-- Texto del contenedor de juego -->
                        <div class="texto-contenedor-dash">
                            <div class="titulo_modulo">
                                <h4>{{ \Illuminate\Support\Str::words($game->title, 3, '...') }}</h4>
                            </div>
                            <div class="parrafo_modulo">
                                <p>{{ $game->developer }}</p>
                            </div>
                        </div>
                        <!-- Botones de ver y eliminar juego -->
                        <div class="boton_view_dash">
                            <!-- Botón de ver -->
                            <a href="{{ route('collection.show', $game->id) }}" class="btn btn-explore">
                                <i class="fa-regular fa-eye icon-white icon-thin"></i>
                            </a>
                            <!-- Botón de eliminar -->
                            <a href="{{ route('collection.delete', $game->id) }}" class="btn btn-delete">
                                <i class="fa-regular fa-trash-can icon-white icon-thin"></i>
                            </a>
                        </div>
                    </section>
                </section>
            @endforeach
        </div>
    @endforeach
</section>