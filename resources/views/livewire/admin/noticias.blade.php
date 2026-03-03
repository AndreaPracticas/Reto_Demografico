<div>
    {{-- Cabecera + botón --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Listado de noticias</h2>
        <button wire:click="create"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Nueva noticia
        </button>
    </div>

    {{-- Buscadores --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-6">

        {{-- Título --}}
        <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </span>
            <input
                type="text"
                wire:model.live.debounce.300ms="searchTitle"
                placeholder="Buscar por título..."
                class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
        </div>

        {{-- Descripción --}}
        <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h10"/>
                </svg>
            </span>
            <input
                type="text"
                wire:model.live.debounce.300ms="searchDescription"
                placeholder="Buscar por descripción..."
                class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
        </div>

        {{-- Campo / Field --}}
        <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4-2A1 1 0 018 17v-3.586L3.293 6.707A1 1 0 013 6V4z"/>
                </svg>
            </span>
            <select
                wire:model.live="searchField"
                class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white"
            >
                <option value="">Todos los campos</option>
                @foreach($fields as $field)
                    <option value="{{ $field->id }}">{{ $field->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Fecha --}}
        <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </span>
            <input
                type="date"
                wire:model.live="searchDate"
                class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
        </div>

    </div>

    {{-- Botón limpiar filtros --}}
    @if($searchTitle || $searchDescription || $searchField || $searchDate)
    <div class="flex justify-end mb-4">
        <button
            wire:click="$set('searchTitle', ''); $set('searchDescription', ''); $set('searchField', ''); $set('searchDate', '')"
            class="text-sm text-indigo-600 hover:underline flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Limpiar filtros
        </button>
    </div>
    @endif

    {{-- Tabla --}}
    <table class="w-full border border-gray-200 rounded-lg overflow-hidden mb-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left p-3">Campo</th>
                <th class="text-left p-3">Título</th>
                <th class="text-left p-3">Fecha</th>
                <th class="text-left p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($noticias as $noticia)
            <tr class="border-t">
                <td class="p-3">{{ $noticia->field->name ?? 'N/A' }}</td>
                <td class="p-3">{{ $noticia->title }}</td>
                <td class="p-3">{{ $noticia->created_at->format('d/m/Y') }}</td>
                <td class="p-3 space-x-2">
                    <button wire:click="edit({{ $noticia->id }})"
                            class="text-blue-600 hover:underline">Editar</button>
                    @if(in_array($noticia->id, $trashedIds))
                        <button wire:click="restore({{ $noticia->id }})"
                                class="text-green-600 hover:underline">Restaurar</button>
                    @else
                        <button wire:click="confirmDelete({{ $noticia->id }})" 
                                class="text-red-600 hover:underline">Eliminar</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal — controlado 100% por Livewire ($showModal) --}}
    @if($showModal)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl w-96 p-6 relative">

            <h3 class="text-lg font-semibold mb-4">
                {{ $noticia_id ? 'Editar Noticia' : 'Nueva Noticia' }}
            </h3>

            {{-- Campo --}}
            <select wire:model="field_id" class="w-full border rounded px-3 py-2 mb-3">
                <option value="">Selecciona un campo</option>
                @foreach($fields as $field)
                    <option value="{{ $field->id }}">{{ $field->name }}</option>
                @endforeach
            </select>
            @error('field_id') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            {{-- Imagen --}}
            <div class="w-full mb-3">
                <label class="block w-full cursor-pointer">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg px-4 py-6 text-center hover:border-indigo-400 transition-colors duration-200">
                        @if($image)
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm text-indigo-600 font-medium">
                                    {{ is_string($image) ? basename($image) : $image->getClientOriginalName() }}
                                </span>
                                <span class="text-xs text-gray-400">Haz clic para cambiar</span>
                            </div>
                        @else
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm text-gray-500">Haz clic para subir una imagen</span>
                                <span class="text-xs text-gray-400">PNG, JPG hasta 2MB</span>
                            </div>
                        @endif
                    </div>
                    <input type="file" wire:model="image" class="hidden" accept="image/*">
                </label>
            </div>
            @error('image') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            {{-- Título --}}
            <input type="text" wire:model="title" placeholder="Título"
                   class="w-full border rounded px-3 py-2 mb-3">
            @error('title') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            {{-- Descripción --}}
            <textarea wire:model="description" placeholder="Descripción"
                      class="w-full border rounded px-3 py-2 mb-3"></textarea>
            @error('description') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            {{-- Enlace --}}
            <input type="text" wire:model="link" placeholder="URL opcional"
                   class="w-full border rounded px-3 py-2 mb-3">
            @error('link') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <div class="flex justify-end space-x-2 mt-4">
                <button wire:click="closeModal"
                        class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
                    Cancelar
                </button>
                <button wire:click="save"
                        class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                    {{ $noticia_id ? 'Actualizar' : 'Crear' }}
                </button>
            </div>

        </div>
    </div>
    @endif

    <!-- Modal de confirmación de eliminación -->
    @if($confirmingDelete)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white rounded-xl w-96 p-6 text-center">

                <div class="text-red-500 mb-4">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>
                </div>

                <h3 class="text-lg font-semibold mb-2">¿Seguro que desea eliminar esta noticia?</h3>

                <p class="text-sm text-gray-500 mb-6">
                    Si la elimina, podrá restaurarla durante los próximos <strong>5 meses</strong>. 
                    Pasado este periodo, se eliminará de forma permanente.
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