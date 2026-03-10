<div>
    {{-- Cabecera --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Listado de Temáticas</h2>
        <button wire:click="create"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Nueva temática
        </button>
    </div>

    {{-- Buscador --}}
    <div class="mb-4">
        <div class="relative w-72">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </span>
            <input type="text" wire:model.live.debounce.300ms="searchName"
                placeholder="Buscar por nombre..."
                class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        </div>
    </div>

    {{-- Tabla --}}
    <table class="w-full border border-gray-200 rounded-lg overflow-hidden mb-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left p-3">Nombre</th>
                <th class="text-left p-3">Creada</th>
                <th class="text-left p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($themes as $theme)
            <tr class="border-t {{ in_array($theme->id, $trashedIds) ? 'bg-red-50' : '' }}">
                <td class="p-3">{{ $theme->name }}</td>
                <td class="p-3">{{ $theme->created_at->format('d/m/Y') }}</td>
                <td class="p-3 space-x-2">
                    <button wire:click="edit({{ $theme->id }})"
                            class="text-blue-600 hover:underline">Editar</button>
                    @if(in_array($theme->id, $trashedIds))
                        <button wire:click="restore({{ $theme->id }})"
                                class="text-green-600 hover:underline">Restaurar</button>
                    @else
                        <button wire:click="confirmDelete({{ $theme->id }})"
                                class="text-red-600 hover:underline">Eliminar</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal formulario --}}
    @if($showModal)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl w-96 p-6">
            <h3 class="text-lg font-semibold mb-4">
                {{ $theme_id ? 'Editar Temática' : 'Nueva Temática' }}
            </h3>

            <input type="text" wire:model="name" placeholder="Nombre de la temática"
                   class="w-full border rounded px-3 py-2 mb-3">
            @error('name') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <div class="flex justify-end space-x-2 mt-4">
                <button wire:click="closeModal"
                        class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancelar</button>
                <button wire:click="save"
                        class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                    {{ $theme_id ? 'Actualizar' : 'Crear' }}
                </button>
            </div>
        </div>
    </div>
    @endif

    {{-- Modal confirmación eliminar --}}
    @if($confirmingDelete)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl w-96 p-6 text-center">
            <div class="text-red-500 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">¿Seguro que desea eliminar esta temática?</h3>
            <p class="text-sm text-gray-500 mb-6">
                Podrá restaurarla durante los próximos <strong>5 meses</strong>.
            </p>
            <div class="flex justify-center space-x-3">
                <button wire:click="cancelDelete"
                        class="px-5 py-2 rounded bg-gray-200 hover:bg-gray-300 font-medium">
                    No, cancelar
                </button>
                <button wire:click="delete"
                        class="px-5 py-2 rounded bg-red-600 text-white hover:bg-red-700 font-medium">
                    Sí, eliminar
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
