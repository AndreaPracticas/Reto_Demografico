<div x-data="{ open: false }" @keydown.escape.window="open = false">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Listado de noticias</h2>
        <button @click="open = true; $wire.create()" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Nueva noticia
        </button>
    </div>

    <table class="w-full border border-gray-200 rounded-lg overflow-hidden mb-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left p-3">Field</th>
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
                    <button @click="open = true; $wire.edit({{ $noticia->id }})" class="text-blue-600 hover:underline">Editar</button>
                    <button wire:click="delete({{ $noticia->id }})" class="text-red-600 hover:underline">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal dinámico -->
    <div x-show="open" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="open = false" class="bg-white rounded-xl w-96 p-6 relative">

            <h3 class="text-lg font-semibold mb-4" x-text="$wire.noticia_id ? 'Editar Noticia' : 'Nueva Noticia'"></h3>

            <!-- Selector de field -->
            <select wire:model.defer="field_id" class="w-full border rounded px-3 py-2 mb-3">
                <option value="">Selecciona un campo</option>
                @foreach($fields as $field)
                    <option value="{{ $field->id }}">{{ $field->name }}</option>
                @endforeach
            </select>
            @error('field_id') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <!-- Subida de imagen -->
            <input type="file" wire:model="image" class="w-full mb-3">
            @error('image') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <!-- Título -->
            <input type="text" wire:model.defer="title" placeholder="Título"
                   class="w-full border rounded px-3 py-2 mb-3">
            @error('title') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <!-- Descripción -->
            <textarea wire:model.defer="description" placeholder="Descripción"
                      class="w-full border rounded px-3 py-2 mb-3"></textarea>
            @error('description') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <div class="flex justify-end space-x-2 mt-4">
                <button @click="open = false" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancelar</button>
                <button wire:click="save" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">Guardar</button>
            </div>
        </div>
    </div>

</div>