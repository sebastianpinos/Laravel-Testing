<x-layouts.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Lista de Alumnos</h1>

        @if(session('mensaje'))
            <div class="alert alert-success bg-green-500 text-white p-3 rounded-md shadow-md mb-4">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('alumnos.create') }}"
                class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-600">
                ➕ Nuevo Alumno
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full border border-gray-200 rounded-md">
                <thead>
                    <tr>
                        @foreach($campos as $campo)
                            <th>{{ ucfirst($campo) }}</th>
                        @endforeach
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                        <tr>
                            @foreach($campos as $campo)
                                <td>{{ $alumno->$campo }}</td>
                            @endforeach
                            <td>
                                <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-info">👁️ Ver</a>
                                <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">✏️ Editar</a>
                                <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Seguro que deseas eliminar este alumno?')">
                                        ❌ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(alumnoId) {
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
                    document.getElementById("form-eliminar-" + alumnoId).submit();
                }
            });
        }
    </script>
</x-layouts.layout>