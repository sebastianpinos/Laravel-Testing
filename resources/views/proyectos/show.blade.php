<x-layouts.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Detalles del Proyecto</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Título del Proyecto:</p>
                    <p class="text-gray-700">{{ $proyecto->titulo }}</p>
                </div>

                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Horas Previstas:</p>
                    <p class="text-gray-700">{{ $proyecto->horas_previstas }} horas</p>
                </div>

                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Fecha de Comienzo:</p>
                    <p class="text-gray-700">{{ $proyecto->fecha_de_comienzo->format('d/m/Y') }}</p>
                </div>

                <div class="p-4 border rounded-md bg-gray-50">
                    <p class="text-lg font-medium">Alumno Asignado:</p>
                    <p class="text-gray-700">
                        {{ $proyecto->alumno ? $proyecto->alumno->nombre : 'No asignado' }}
                    </p>
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('proyectos.index') }}" class="btn btn-outline btn-error">Volver</a>
                <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-primary">Editar Proyecto</a>
            </div>
        </div>
    </div>
</x-layouts.layout>
