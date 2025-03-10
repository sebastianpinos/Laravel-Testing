<x-layouts.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Perfil del Usuario</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Información del Usuario -->
            <div class="flex items-center gap-4 mb-6">
                <div class="avatar">
                    <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img src="https://i.pravatar.cc/150?u={{ auth()->user()->email }}" alt="Avatar del Usuario">
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-bold">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <!-- Formulario para Editar Información -->
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-control mb-4">
                    <label for="name" class="label">Nombre Completo</label>
                    <input id="name" name="name" type="text" value="{{ auth()->user()->name }}" 
                           class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="email" class="label">Correo Electrónico</label>
                    <input id="email" name="email" type="email" value="{{ auth()->user()->email }}" 
                           class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="password" class="label">Contraseña Nueva (Opcional)</label>
                    <input id="password" name="password" type="password" 
                           class="input input-bordered w-full">
                </div>

                <div class="form-control mb-4">
                    <label for="password_confirmation" class="label">Confirmar Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" 
                           class="input input-bordered w-full">
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline btn-error">Volver</a>
                    <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
