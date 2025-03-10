<x-layouts.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Crear Nuevo Alumno</h1>

        @if ($errors->any())
            <div class="alert alert-error bg-red-500 text-white p-3 rounded-md shadow-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('alumnos.store') }}" method="POST">
                @csrf

                <div class="form-control mb-4">
                    <label for="nombre" class="label">Nombre del Alumno</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre"
                        class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="email" class="label">Correo Electrónico</label>
                    <input id="email" name="email" type="email" placeholder="Ingrese el email"
                        class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="edad" class="label">Edad</label>
                    <input id="edad" name="edad" type="number" placeholder="Ingrese la edad"
                        class="input input-bordered w-full" required>
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-outline btn-error">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Alumno</button>
                </div>

                <div class="form-control mb-4">
                    <label for="cancion_favorita" class="label">Canción Favorita</label>
                    <input id="cancion_favorita" name="cancion_favorita" type="text"
                        placeholder="Ingrese el nombre de una canción" class="input input-bordered w-full">
                </div>


            </form>
        </div>
    </div>
</x-layouts.layout>