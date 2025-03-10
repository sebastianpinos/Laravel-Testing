<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="/images/logo.png" alt="Logo" class="w-8 h-8">
                <a href="{{ route('home') }}" class="text-2xl font-bold">Gestor de Proyectos</a>
            </div>
            <div class="flex gap-4 items-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-200">Dashboard</a>
                    <a href="{{ route('proyectos.index') }}" class="hover:text-blue-200">Proyectos</a>
                    <a href="{{ route('alumnos.index') }}" class="hover:text-blue-200">Alumnos</a>
                    <a href="{{ route('profile.edit') }}" class="hover:text-blue-200">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline btn-success">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        @if(session('mensaje'))
            <div class="alert alert-success bg-green-500 text-white p-3 rounded-md shadow-md">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md">
            {{ $slot }}
        </div>
    </div>

    <footer class="bg-blue-600 text-white text-center py-4 mt-10 shadow-md">
        <p class="font-medium">&copy; {{ date('Y') }} - Gestor de Proyectos. Todos los derechos reservados.</p>
        <p class="text-sm">Diseñado con ❤️ usando Laravel y Tailwind CSS</p>
    </footer>
</body>
</html>
