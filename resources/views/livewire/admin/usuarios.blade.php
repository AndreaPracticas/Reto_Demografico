<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Listado de Usuarios</h2>
        <button wire:click="create"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Nuevo usuario
        </button>
    </div>

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

    <table class="w-full border border-gray-200 rounded-lg overflow-hidden mb-6">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left p-3">Nombre</th>
                <th class="text-left p-3">Email</th>
                <th class="text-left p-3">Rol</th>
                <th class="text-left p-3">Estado</th>
                <th class="text-left p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr wire:key="user-{{ $user->id }}" class="border-t {{ in_array($user->id, $trashedIds) ? 'bg-red-50' : '' }}">
                <td class="p-3">{{ $user->name }}</td>
                <td class="p-3">{{ $user->email }}</td>
                <td class="p-3">
                    <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full
                        {{ $user->is_admin ? 'bg-indigo-100 text-indigo-700' : 'bg-gray-100 text-gray-600' }}">
                        {{ $user->is_admin ? 'Admin' : 'Usuario' }}
                    </span>
                </td>
                <td class="p-3">
                    @if(in_array($user->id, $trashedIds))
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                            Eliminado
                        </span>
                    @elseif($user->is_suspended)
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                            Suspendido
                        </span>
                    @else
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                            Activo
                        </span>
                    @endif
                </td>
                <td wire:key="actions-{{ $user->id }}-{{ in_array($user->id, $trashedIds) ? 'trashed' : 'active' }}" class="p-3 space-x-2">
                    @if(!in_array($user->id, $trashedIds))
                        <button wire:click="edit({{ $user->id }})"
                                class="text-blue-600 hover:underline">Editar</button>
                        <button wire:click="toggleSuspend({{ $user->id }})"
                                class="{{ $user->is_suspended ? 'text-green-600' : 'text-yellow-600' }} hover:underline">
                            {{ $user->is_suspended ? 'Activar' : 'Suspender' }}
                        </button>
                        <button wire:click="confirmDelete({{ $user->id }})"
                                class="text-red-600 hover:underline">Eliminar</button>
                    @else
                        <button wire:click="restore({{ $user->id }})"
                                class="text-green-600 hover:underline">Restaurar</button>
                        <button wire:click="confirmForceDelete({{ $user->id }})"
                                class="text-red-800 hover:underline">Eliminar permanentemente</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($showModal)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl w-96 p-6">
            <h3 class="text-lg font-semibold mb-4">
                {{ $user_id ? 'Editar Usuario' : 'Nuevo Usuario' }}
            </h3>

            <input type="text" wire:model="name" placeholder="Nombre"
                   class="w-full border rounded px-3 py-2 mb-3">
            @error('name') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <input type="email" wire:model="email" placeholder="Email"
                   class="w-full border rounded px-3 py-2 mb-3">
            @error('email') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <input type="password" wire:model="password"
                   placeholder="{{ $user_id ? 'Nueva contraseña (dejar vacío para no cambiar)' : 'Contraseña' }}"
                   class="w-full border rounded px-3 py-2 mb-3">
            @error('password') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <label class="flex items-center justify-between mb-4 cursor-pointer">
                <span class="text-sm text-gray-700">Es administrador</span>
                <div x-data="{ on: @entangle('is_admin') }"
                    @click="on = !on"
                    :class="on ? 'bg-indigo-600' : 'bg-gray-300'"
                    class="relative w-11 h-6 rounded-full transition-colors duration-200 cursor-pointer">
                    <div :class="on ? 'translate-x-5' : 'translate-x-1'"
                        class="absolute top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform duration-200">
                    </div>
                </div>
            </label>

            <div class="flex justify-end space-x-2 mt-4">
                <button wire:click="closeModal"
                        class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancelar</button>
                <button wire:click="save"
                        class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                    {{ $user_id ? 'Actualizar' : 'Crear' }}
                </button>
            </div>
        </div>
    </div>
    @endif

    @if($confirmingDelete)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl w-96 p-6 text-center">
            <div class="text-red-500 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">¿Eliminar este usuario?</h3>
            <p class="text-sm text-gray-500 mb-6">
                El usuario no podrá acceder pero podrá ser restaurado manualmente.
            </p>
            <div class="flex justify-center space-x-3">
                <button wire:click="cancelDelete"
                        class="px-5 py-2 rounded bg-gray-200 hover:bg-gray-300 font-medium">Cancelar</button>
                <button wire:click="delete"
                        class="px-5 py-2 rounded bg-red-600 text-white hover:bg-red-700 font-medium">Sí, eliminar</button>
            </div>
        </div>
    </div>
    @endif

    @if($confirmingForceDelete)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl w-96 p-6 text-center">
            <div class="text-red-700 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">¿Eliminar permanentemente?</h3>
            <p class="text-sm text-gray-500 mb-6">
                Esta acción es <strong>irreversible</strong>. El usuario será eliminado para siempre.
            </p>
            <div class="flex justify-center space-x-3">
                <button wire:click="cancelDelete"
                        class="px-5 py-2 rounded bg-gray-200 hover:bg-gray-300 font-medium">Cancelar</button>
                <button wire:click="forceDelete"
                        class="px-5 py-2 rounded bg-red-800 text-white hover:bg-red-900 font-medium">Sí, eliminar para siempre</button>
            </div>
        </div>
    </div>
    @endif
</div>