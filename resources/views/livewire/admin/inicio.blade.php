<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Usuarios -->
        <div class="bg-white shadow rounded-xl p-6 flex flex-col items-center">
            <h3 class="text-lg font-semibold mb-2">Usuarios Registrados</h3>
            <p class="text-2xl font-bold text-indigo-600">{{ $resumen['usuarios'] }}</p>
        </div>

        <!-- Noticias -->
        <div class="bg-white shadow rounded-xl p-6 flex flex-col items-center">
            <h3 class="text-lg font-semibold mb-2">Noticias</h3>
            <p class="text-2xl font-bold text-indigo-600">{{ $resumen['noticias'] }}</p>
        </div>

        <!-- Archivos -->
        <div class="bg-white shadow rounded-xl p-6 flex flex-col items-center">
            <h3 class="text-lg font-semibold mb-2">Archivos Subidos</h3>
            <p class="text-2xl font-bold text-indigo-600">{{ $resumen['archivos'] }}</p>
        </div>

    </div>

    <div class="mt-8 bg-white shadow rounded-xl p-6">
        <h2 class="text-xl font-semibold mb-4">Últimas acciones</h2>
        <ul class="list-disc pl-5 text-gray-700 space-y-1">
            @foreach($ultimasAcciones as $accion)
                <li>{{ $accion }}</li>
            @endforeach
        </ul>
    </div>
</div>