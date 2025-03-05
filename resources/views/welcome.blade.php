<x-layouts.layout>
    @guest
    <div
        class="hero min-h-full"
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                <p class="mb-5">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>
    @endguest

    @auth
    <div class="flex flex-wrap gap-4 p-5">
        <!-- Tarjeta de Alumnos -->
        <div class="card bg-base-100 image-full w-96 shadow-xl">
            <figure>
                <img src="{{ asset("images/alumnos.jpeg") }}" alt="Alumnos" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Alumnos</h2>
                <p>Visualizar Alumnos</p>
                <div class="card-actions justify-end">
                    <a class="btn btn-primary" href="{{ route("alumnos.index") }}">Ver Alumnos</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Proyectos -->
        <div class="card bg-base-100 image-full w-96 shadow-xl">
            <figure>
                <img src="{{ asset("images/proyectos.jpeg") }}" alt="Proyectos" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Proyectos</h2>
                <p>Gestión de Proyectos</p>
                <div class="card-actions justify-end">
                    <a class="btn btn-primary" href="{{ url("/proyectos") }}">Ver Proyectos</a>
                </div>
            </div>
        </div>
    </div>
    @endauth

</x-layouts.layout>

