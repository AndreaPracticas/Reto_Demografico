<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css') <!-- TailwindCSS -->
    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 h-screen flex">

    <!-- Sidebar -->
    <aside class="bg-gray-800 text-white w-64 min-h-screen flex flex-col">
        <div class="px-6 py-4 text-2xl font-bold border-b border-gray-700">
            Reto Demográfico
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('admin.inicio') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Inicio</a>
            <a href="{{ route('admin.noticias') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Noticias</a>
            <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                <a href="{{ route('admin.ayudas') }}"
                class="block px-4 py-2 rounded hover:bg-gray-700">
                    Ayudas y Subvenciones
                </a>
                <div x-show="open" x-transition class="ml-4 space-y-1">
                    <a href="{{ route('admin.ayudas.tematicas') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-600 text-sm text-gray-300">Temáticas</a>
                    <a href="{{ route('admin.ayudas.subtematicas') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-600 text-sm text-gray-300">Subtemáticas</a>
                </div>
            </div>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Usuarios</a>
        </nav>

        <div class="px-6 py-4 border-t border-gray-700">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded bg-red-600 hover:bg-red-700">Cerrar sesión</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <header class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-semibold">@yield('page-title', 'Dashboard')</h1>
            <div>
                Bienvenido, <strong>{{ Auth::user()->name }}</strong>
            </div>
        </header>

        <section>
            {{-- slot used by Livewire page components --}}
            {{ isset($slot) ? $slot : '' }}

            {{-- traditional section for blade views --}}
            @yield('content')
        </section>
    </main>
    @livewireScripts
</body>
</html>