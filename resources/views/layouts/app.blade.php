<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reto Demográfico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Reto Demográfico')</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
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
    @livewireScripts
    <script>
    document.addEventListener('livewire:init', () => {
        Livewire.hook('request', ({ fail }) => {
            fail(({ status, preventDefault }) => {
                if (status === 419) {
                    preventDefault();
                    window.location.reload();
                }
            });
        });
    });
    </script>
</body>
</html>