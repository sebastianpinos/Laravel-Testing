<x-layouts.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Lista de Proyectos</h1>

        @if(session('mensaje'))
            <div class="alert alert-success bg-green-500 text-white p-3 rounded-md shadow-md mb-4">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('proyectos.create') }}"
                class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-600">
                ➕ Nuevo Proyecto
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full border border-gray-200 rounded-md">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Horas Previstas</th>
                        <th>Fecha de Comienzo</th>
                        <th>Alumno Asignado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyectos as $proyecto)
                        <tr class="hover:bg-gray-100">
                            <td>{{ $proyecto->id }}</td>
                            <td class="font-medium">{{ $proyecto->titulo }}</td>
                            <td>{{ $proyecto->horas_previstas }}</td>
                            <td>{{ $proyecto->fecha_de_comienzo->format('d/m/Y') }}</td>
                            <td>{{ $proyecto->alumno ? $proyecto->alumno->nombre : 'No asignado' }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('proyectos.edit', $proyecto->id) }}"
                                    class="btn btn-warning bg-yellow-500 text-white py-1 px-3 rounded-md hover:bg-yellow-600">
                                    ✏️ Editar
                                </a>
                                <button onclick="confirmDelete({{ $proyecto->id }})"
                                    class="btn btn-danger bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600">
                                    ❌ Eliminar
                                </button>
                                <form id="form-eliminar-{{ $proyecto->id }}"
                                    action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf @method('DELETE')
                                </form>
                                <a href="{{ route('proyectos.show', $proyecto->id) }}"
                                    class="btn btn-info bg-blue-400 text-white py-1 px-3 rounded-md hover:bg-blue-500">
                                    👁️ Ver
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(proyectoId) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("form-eliminar-" + proyectoId).submit();
                }
            });
        }
    </script>
</x-layouts.layout>