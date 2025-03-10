<x-layouts.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Detalles del Alumno</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Nombre del Alumno:</p>
                    <p class="text-gray-700">{{ $alumno->nombre }}</p>
                </div>

                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Correo Electrónico:</p>
                    <p class="text-gray-700">{{ $alumno->email }}</p>
                </div>

                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Edad:</p>
                    <p class="text-gray-700">{{ $alumno->edad }}</p>
                </div>

                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Idiomas:</p>
                    @if($alumno->idiomas->isNotEmpty())
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach($alumno->idiomas as $idioma)
                                <li>{{ $idioma->idioma }} (Nivel: {{ $idioma->nivel }})</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-700">No tiene idiomas registrados.</p>
                    @endif
                </div>

                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Canción Favorita:</p>
                    @if($alumno->cancion_favorita)
                        <p class="text-gray-700">{{ $alumno->cancion_favorita }}</p>
                        @if(isset($cancionInfo['caratula']))
                            <img src="{{ $cancionInfo['caratula'] }}" alt="Carátula del álbum"
                                class="rounded-lg shadow-md mt-2">
                        @endif
                    @else
                        <p class="text-gray-700">No tiene canción favorita registrada.</p>
                    @endif
                </div>

            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('alumnos.index') }}" class="btn btn-outline btn-error">Volver</a>
                <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-primary">Editar Alumno</a>
            </div>
        </div>
    </div>
</x-layouts.layout>