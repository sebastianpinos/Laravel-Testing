<x-layouts.layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-center mb-6">Registro de Usuario</h1>

            @if ($errors->any())
                <div class="alert alert-error bg-red-500 text-white p-3 rounded-md shadow-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-control mb-4">
                    <label for="name" class="label">Nombre Completo</label>
                    <input id="name" name="name" type="text" placeholder="Ingrese su nombre completo" 
                           class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="email" class="label">Correo Electrónico</label>
                    <input id="email" name="email" type="email" placeholder="Ingrese su correo electrónico" 
                           class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="password" class="label">Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Ingrese su contraseña" 
                           class="input input-bordered w-full" required>
                </div>

                <div class="form-control mb-4">
                    <label for="password_confirmation" class="label">Confirmar Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" 
                           placeholder="Confirme su contraseña" class="input input-bordered w-full" required>
                </div>

                <button type="submit" class="btn btn-primary w-full">Registrarse</button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                ¿Ya tienes una cuenta? 
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Inicia sesión aquí</a>
            </p>
        </div>
    </div>
</x-layouts.layout>
