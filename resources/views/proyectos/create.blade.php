<x-layouts.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Crear Nuevo Proyecto</h1>

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
            <form action="{{ route('proyectos.store') }}" method="POST">
                @csrf
                
                <div class="form-control mb-4">
                    <label for="titulo" class="label">Título del Proyecto</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Ingrese el título" 
                           class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="horas_previstas" class="label">Horas Previstas</label>
                    <input id="horas_previstas" name="horas_previstas" type="number" placeholder="Ingrese las horas previstas" 
                           class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="fecha_de_comienzo" class="label">Fecha de Comienzo</label>
                    <input id="fecha_de_comienzo" name="fecha_de_comienzo" type="date" 
                           class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="student_id" class="label">Seleccionar Alumno</label>
                    <select name="student_id" id="student_id" class="select select-bordered w-full" required>
                        <option value="" disabled selected>-- Selecciona un alumno --</option>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('proyectos.index') }}" class="btn btn-outline btn-error">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Proyecto</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>