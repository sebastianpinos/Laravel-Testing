<x-layouts.layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-center mb-6">Iniciar Sesión</h1>

            @if ($errors->any())
                <div class="alert alert-error bg-red-500 text-white p-3 rounded-md shadow-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

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

                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="checkbox checkbox-primary">
                        <span class="ml-2">Recuérdame</span>
                    </label>
                    <a href="#" class="text-blue-500 hover:underline">¿Olvidó su contraseña?</a>
                </div>

                <button type="submit" class="btn btn-primary w-full">Iniciar Sesión</button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                ¿No tienes cuenta? 
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Regístrate aquí</a>
            </p>
        </div>
    </div>
</x-layouts.layout>
