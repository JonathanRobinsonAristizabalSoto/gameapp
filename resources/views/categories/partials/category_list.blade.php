{{-- Ubicación: gameapp/resources/views/categories/partials/category_list.blade.php --}}

@foreach ($categories as $category)
    <section class="contenedor_dash">
        <section class="contenido_dash">
            <!-- Contenedor para la imagen de categories en miniatura -->
            <div class="img_perfil_miniatura">
                <img class="img_perfil_usuario_miniatura"
                    src="{{ $category->image ? asset('images/' . $category->image) : asset('images/no-photo.png') }}"
                    alt="category Thumbnail">
            </div>
            <div class="texto-contenedor-dash">
                <div class="titulo_modulo">
                    <h4>{{ $category->name }}</h4>
                </div>
                <div class="parrafo_modulo">
                    <p>{{ $category->manufacturer }}</p>
                </div>
            </div>

            <!-- Botónes para ver editar y borrar categories -->
            <div class="boton_view_dash">
                <!-- Botón de ver -->
                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-explore">
                    <i class="fa-regular fa-eye icon-white icon-thin"></i>
                </a>
                <!-- Botón de editar -->
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit">
                    <i class="fa-regular fa-pen-to-square icon-white icon-thin"></i> <!-- Icono de editar -->
                </a>
                <!-- Botón de eliminar -->
                <a href="{{ route('categories.delete', $category->id) }}" class="btn btn-delete">
                    <i class="fa-regular fa-trash-can icon-white icon-thin"></i> <!-- Icono de eliminar -->
                </a>
            </div>
        </section>
    </section>
@endforeach
