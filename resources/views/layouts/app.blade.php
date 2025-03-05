<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        
        <!-- Hero Section -->
        <section class="bg-gradient-to-br from-blue-600 to-indigo-900 text-white">
            <div class="container mx-auto py-20 text-center">
                <h1 class="text-5xl font-extrabold mb-6">Welcome to Our Platform</h1>
                <p class="text-lg mb-6">Join now and start managing your projects and tasks effortlessly</p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-blue-600 rounded-lg shadow-md hover:shadow-xl hover:bg-gray-100">Login</a>
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-gray-100 text-blue-600 rounded-lg shadow-md hover:shadow-xl hover:bg-white">Register</a>
                </div>
            </div>
        </section>

        <!-- Dashboard Cards (Visible after authentication) -->
        @auth
        <section class="py-10">
            <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card: Alumnos -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/alumnos.jpeg') }}" alt="Alumnos" class="h-40 w-full object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3">Alumnos</h3>
                        <p class="text-gray-700 mb-4">Visualize and manage your students easily</p>
                        <a href="{{ route('alumnos.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">View Students</a>
                    </div>
                </div>

                <!-- Card: Proyectos -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/proyectos.jpeg') }}" alt="Proyectos" class="h-40 w-full object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3">Proyectos</h3>
                        <p class="text-gray-700 mb-4">Effortlessly manage your projects</p>
                        <a href="{{ url('/proyectos') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">View Projects</a>
                    </div>
                </div>
            </div>
        </section>
        @endauth
    </body>
</html>

