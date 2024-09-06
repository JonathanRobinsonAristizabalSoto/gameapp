{{-- gameeapp/resources/views/users/seachrs.blade.php --}}

@forelse ($users as $user)
    <section class="contenedor_dash">
        <section class="contenido_dash">
            <img src="{{ asset('images/ico-users.png') }}" alt="User Icon" class="img-contenedor-dash">
            <div class="texto-contenedor-dash">
                <div class="titulo_modulo">
                    <p>{{ $user->fullname }}</p>
                </div>
                <div class="parrafo_modulo">
                    <h3>{{ $user->role }}</h3>
                </div>
            </div>
            <div class="boton_view_dash">
                <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-explore">
                    <img class="content-btn-view-dash" src="{{ asset('images/content-btn-view-users.svg') }}"
                        alt="View User">
                </a>
            </div>
        </section>
    </section>
@empty
    <div>
        usuario no encontrado
    </div>
@endforelse
