<div>
    {{-- Cabecera --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Listado de Ayudas</h2>
        <button wire:click="create"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Nueva ayuda
        </button>
    </div>

    {{-- Buscadores --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-4">

        <div class="relative">
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

        <select wire:model.live="searchTheme"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white">
            <option value="">Todos los temas</option>
            @foreach($themes as $theme)
                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
            @endforeach
        </select>

        <select wire:model.live="searchSubtheme"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white">
            <option value="">Todos los subtemas</option>
            @foreach($allSubthemes as $subtheme)
                <option value="{{ $subtheme->id }}">{{ $subtheme->name }}</option>
            @endforeach
        </select>

        <select wire:model.live="searchScope"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white">
            <option value="">Todos los ámbitos</option>
            @foreach($scopes as $scope)
                <option value="{{ $scope->id }}">{{ $scope->name }}</option>
            @endforeach
        </select>

        <div class="relative">
            <label class="text-xs text-gray-500 mb-1 block">Estado</label>
            <select wire:model.live="searchStatus"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white">
                <option value="">Todos los estados</option>
                <option value="abierto">Abierto</option>
                <option value="cerrado">Cerrado</option>
            </select>
        </div>

        <div class="relative">
            <label class="text-xs text-gray-500 mb-1 block">Fecha cierre hasta</label>
            <input type="date" wire:model.live="searchDateTo"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        </div>

    </div>

    {{-- Tabla --}}
    <table class="w-full border border-gray-200 rounded-lg overflow-hidden mb-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left p-3">Nombre</th>
                <th class="text-left p-3">Tema</th>
                <th class="text-left p-3">Subtema</th>
                <th class="text-left p-3">Ámbito</th>
                <th class="text-left p-3">Cierre</th>
                <th class="text-left p-3">Estado</th>
                <th class="text-left p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
            <tr class="border-t {{ in_array($file->id, $trashedIds) ? 'bg-red-50 text-gray-400' : '' }}">
                <td class="p-3">{{ $file->name }}</td>
                <td class="p-3">{{ $file->theme->name ?? 'N/A' }}</td>
                <td class="p-3">{{ $file->subtheme->name ?? 'N/A' }}</td>
                <td class="p-3">{{ $file->scopeRelation->name ?? 'N/A' }}</td>
                <td class="p-3">{{ $file->closing_date }}</td>
                <td class="p-3">
                    @php
                        $ahora = now();
                        $abierto = $ahora->between(
                            \Carbon\Carbon::parse($file->reopening_date),
                            \Carbon\Carbon::parse($file->closing_date)
                        );
                    @endphp

                    @if($abierto)
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                            Abierto
                        </span>
                    @else
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                            Cerrado
                        </span>
                    @endif
                </td>
                <td wire:key="actions-file-{{ $file->id }}-{{ in_array($file->id, $trashedIds) ? 'trashed' : 'active' }}" class="p-3 space-x-2">
                    <button wire:click="edit({{ $file->id }})"
                            class="text-blue-600 hover:underline">Editar</button>

                    @if(in_array($file->id, $trashedIds))
                        <button wire:click="restore({{ $file->id }})"
                                class="text-green-600 hover:underline">Restaurar</button>
                    @else
                        <button wire:click="confirmDelete({{ $file->id }})"
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
        <div class="bg-white rounded-xl w-[480px] p-6 relative overflow-y-auto max-h-screen">

            <h3 class="text-lg font-semibold mb-4">
                {{ $file_id ? 'Editar Archivo' : 'Nuevo Archivo' }}
            </h3>

            {{-- Nombre --}}
            <input type="text" wire:model="name" placeholder="Nombre del archivo"
                   class="w-full border rounded px-3 py-2 mb-3">
            @error('name') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            {{-- Tema --}}
            <select wire:model.live="theme_id" class="w-full border rounded px-3 py-2 mb-3">
                <option value="">Selecciona un tema</option>
                @foreach($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
            </select>
            @error('theme_id') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            {{-- Subtema --}}
            <select wire:model="subtheme_id" class="w-full border rounded px-3 py-2 mb-3">
                <option value="">
                    {{ $theme_id ? 'Selecciona un subtema' : 'Primero selecciona una tema' }}
                </option>
                @foreach($subthemes as $subtheme)
                    <option value="{{ $subtheme['id'] }}">{{ $subtheme['name'] }}</option>
                @endforeach
            </select>
            @error('subtheme_id') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            {{-- Ámbito --}}
            <select wire:model="scope_id" class="w-full border rounded px-3 py-2 mb-3">
                <option value="">Selecciona un ámbito</option>
                @foreach($scopes as $scope)
                    <option value="{{ $scope->id }}">{{ $scope->name }}</option>
                @endforeach
            </select>
            @error('scope_id') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            {{-- Estado --}}
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-gray-700">Estado: <span class="{{ $status_mode === 'abierto' ? 'text-green-700 font-semibold' : 'text-red-700 font-semibold' }}">{{ ucfirst($status_mode) }}</span></span>
                <div x-data="{ on: @entangle('status_mode').live }"
                    @click="on = (on === 'abierto') ? 'cerrado' : 'abierto'"
                    :class="on === 'abierto' ? 'bg-green-500' : 'bg-red-400'"
                    class="relative w-11 h-6 rounded-full transition-colors duration-200 cursor-pointer">
                    <div :class="on === 'abierto' ? 'translate-x-5' : 'translate-x-1'"
                        class="absolute top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform duration-200">
                    </div>
                </div>
            </div>

            {{-- Fechas y horas --}}
            <div class="grid grid-cols-2 gap-3 mb-3">
                <div>
                    <label class="text-xs text-gray-500 mb-1 block">Fecha apertura</label>
                    <input type="date" wire:model="reopening_date"
                        class="w-full border rounded px-3 py-2">
                    @error('reopening_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-xs text-gray-500 mb-1 block">Hora apertura</label>
                    <input type="time" wire:model="reopening_time"
                        class="w-full border rounded px-3 py-2">
                    @error('reopening_time') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-xs text-gray-500 mb-1 block">Fecha cierre</label>
                    <input type="date" wire:model="closing_date"
                        class="w-full border rounded px-3 py-2">
                    @error('closing_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-xs text-gray-500 mb-1 block">Hora cierre</label>
                    <input type="time" wire:model="closing_time"
                        class="w-full border rounded px-3 py-2">
                    @error('closing_time') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- PDF --}}
            <div class="w-full mb-3">
                <label class="block w-full cursor-pointer">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg px-4 py-6 text-center hover:border-indigo-400 transition-colors duration-200">
                        @if($pdf)
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm text-indigo-600 font-medium">
                                    {{ is_string($pdf) ? basename($pdf) : $pdf->getClientOriginalName() }}
                                </span>
                                <span class="text-xs text-gray-400">Haz clic para cambiar</span>
                            </div>
                        @else
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-sm text-gray-500">Haz clic para subir un PDF</span>
                                <span class="text-xs text-gray-400">Solo PDF hasta 10MB</span>
                            </div>
                        @endif
                    </div>
                    <input type="file" wire:model="pdf" class="hidden" accept=".pdf">
                </label>
            </div>
            @error('pdf') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <div class="flex justify-end space-x-2 mt-4">
                <button wire:click="closeModal"
                        class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancelar</button>
                <button wire:click="save"
                        class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                    {{ $file_id ? 'Actualizar' : 'Crear' }}
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
            <h3 class="text-lg font-semibold mb-2">¿Seguro que desea eliminar esta ayuda?</h3>
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
