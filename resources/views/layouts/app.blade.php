<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reto Demográfico">
    <title>@yield('title', 'Reto Demográfico')</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col page-fade">
    <!-- Header -->
    @include('components.header')

    <!-- Barra de navegación -->
    @include('components.navmenu')
    
    <!-- Contenido principal -->
    <main class="flex-1">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('components.footer')
</body>
</html>