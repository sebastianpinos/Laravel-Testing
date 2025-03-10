<x-layouts.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Dashboard</h1>

        <!-- Estadísticas Principales -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Total de Proyectos</div>
                    <div class="stat-value">{{ $totalProyectos }}</div>
                </div>
            </div>

            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Total de Alumnos</div>
                    <div class="stat-value">{{ $totalAlumnos }}</div>
                </div>
            </div>

            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Última Actualización</div>
                    <div class="stat-value">{{ now()->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>

        <!-- Últimos Registros -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Últimos Proyectos -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Últimos Proyectos</h2>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($ultimosProyectos as $proyecto)
                        <li>
                            {{ $proyecto->titulo }} - {{ $proyecto->fecha_de_comienzo->format('d/m/Y') }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Últimos Alumnos -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Últimos Alumnos</h2>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($ultimosAlumnos as $alumno)
                        <li>
                            {{ $alumno->nombre }} - {{ $alumno->email }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Accesos Rápidos -->
        <div class="mt-8 text-center">
            <a href="{{ route('proyectos.create') }}" class="btn btn-primary mx-2">➕ Nuevo Proyecto</a>
            <a href="{{ route('alumnos.create') }}" class="btn btn-primary mx-2">➕ Nuevo Alumno</a>
        </div>
    </div>
</x-layouts.layout>