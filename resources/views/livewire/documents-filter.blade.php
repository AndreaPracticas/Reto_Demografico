<div>

    <!-- Selector Scope -->
    <div class="grid grid-cols-3 gap-2 mb-6">
        @foreach(['regionales','nacionales','europeas'] as $s)
            <button wire:click="setScope('{{ $s }}')"
                    class="p-4 rounded-lg font-semibold text-center
                        {{ $scope === $s ? 'bg-orange-500 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
                {{ ucfirst($s) }}
            </button>
        @endforeach
    </div>

    <!-- Selector Topics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @foreach($topics as $t)
            <button wire:click="setTopic('{{ $t }}')"
                    class="p-5 rounded-xl text-left
                        {{ $topic === $t ? 'bg-blue-500 text-white shadow-lg' : 'bg-blue-50 hover:bg-blue-100' }}">
                <h3 class="font-medium text-blue-900">{{ $t }}</h3>
            </button>
        @endforeach
    </div>

    <!-- Documentos filtrados -->
    <div class="space-y-4">
        @forelse($documents as $doc)
            <div class="p-4 border rounded shadow">
                <h3 class="font-semibold">{{ $doc->name }}</h3>
                <p>{{ $doc->description ?? 'Sin descripción' }}</p>
                <a href="{{ asset('storage/' . $doc->pdf_path) }}" target="_blank"
                   class="text-blue-500 hover:underline mt-2 inline-block">
                    Abrir PDF
                </a>
            </div>
        @empty
            <p class="italic text-gray-400">No hay documentos disponibles.</p>
        @endforelse
    </div>

</div>
