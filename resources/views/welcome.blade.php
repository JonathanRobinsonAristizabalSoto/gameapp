{{-- Ubicación: gameapp/resources/views/welcome.blade.php --}}

<!-- Usa el layout 'plantilla1' -->
@extends('layouts.plantilla1')

<!-- Título de la página -->
@section('title', 'Welcome')

<!-- Clase para <main> -->
@section('class', 'cuerpo')

<!-- Contenido principal -->
@section('content')
    <div id="main-content">
        <!-- Encabezado con logo -->
        <header>
            <img src="{{ asset('images/logo-cabecera.svg') }}" alt="Logo">
        </header>

        <!-- Mensajes de éxito y error -->
        @if (session('success'))
            <div class="alert alert-success" id="success-message" role="alert"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error" id="error-message" role="alert"
                style="position: absolute; top: 200px; left: 50%; transform: translateX(-50%); z-index: 1000; text-align: center; width: 330px;">
                {{ session('error') }}
            </div>
        @endif

        <!-- Sección del carrusel -->
        <section class="slider owl-carousel owl-theme">
            <!-- Imágenes del carrusel -->
            @foreach($games as $game)
                <img class="item" src="{{ asset('images/' . $game->image) }}" alt="{{ $game->title }}">
            @endforeach
        </section>

        <!-- Pie de página con botón de exploración -->
        <footer>
            <a href="#" class="btn btn-explore">
                <img class="content-btn-footer" src="{{ asset('images/content-btn-footer.svg') }}" alt="explore">
            </a>
        </footer>
    </div>

    <!-- Loader -->
    <div id="loader" class="loader" style="display: none;"></div>

    <!-- Contenedor del catálogo (invisible al principio) -->
    <div id="catalogue-container" style="display: none;">
        @yield('catalogue')
    </div>
@endsection

<!-- Sección para scripts JS específicos de esta vista -->
@section('js')
    <script>
        $(document).ready(function() {
            $('#main-content').hide();
            $('#main-content').fadeIn(400);

            // Inicialización del carrusel
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    }
                }
            });

            // Evento click para el botón de exploración
            $('.btn-explore').on('click', function(event) {
                event.preventDefault();
                $('#main-content').fadeOut(400, function() {
                    $('#loader').fadeIn(300, function() {
                        setTimeout(function() {
                            $('#loader').fadeOut(300, function() {
                                $('#catalogue-container').fadeIn(300);
                                window.location.href = "{{ route('catalogue') }}";
                            });
                        }, 300);
                    });
                });
            });
        });
    </script>
@endsection