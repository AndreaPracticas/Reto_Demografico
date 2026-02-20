<div>
    @php
    use App\Models\File; // IMPORTANTE: tu modelo, no la clase Filesystem

    //Normalizar texto para los iconos
    function normalizeTopic($topic) {
    $normalized = mb_strtolower($topic); // minúsculas
    $normalized = preg_replace('/[áàäâ]/u', 'a', $normalized);
    $normalized = preg_replace('/[éèëê]/u', 'e', $normalized);
    $normalized = preg_replace('/[íìïî]/u', 'i', $normalized);
    $normalized = preg_replace('/[óòöô]/u', 'o', $normalized);
    $normalized = preg_replace('/[úùüû]/u', 'u', $normalized);
    $normalized = preg_replace('/\s+/', '', $normalized); // quitar espacios
    $normalized = preg_replace('/[^a-z0-9]/', '', $normalized); // quitar símbolos
    return $normalized;
}
    @endphp
    <!-- Selector Scope -->
    <div class="grid grid-cols-3 mb-6">
        @foreach(['regionales','nacionales','europeas'] as $s)
            <button wire:click="setScope('{{ $s }}')"
                    class="p-6 font-semibold text-center bg-[#E2E2E2] text-[33px]
                        {{ $scope === $s ? 'shadow-[0_0_20px_10px_rgba(0,0,0,0.2)] z-50' : 'bg-[#E2E2E2] hover:bg-gray-300' }}">
                {{ ucfirst($s) }}
            </button>
        @endforeach
    </div>

    <h3 class="font-semibold text-[29px] ml-43 mt-13 mb-27">Ayudas y <br> Subvenciones</h3>
    <div class="flex ml-35 mr-35 mb-30">
        <!-- Selector Topics -->
        <div class='w-60 flex-shrink-0'>
            <div class="grid grid-cols-1 gap-2">
                @foreach($topics as $t)
                    <button wire:click="setTopic('{{ $t }}')"
                        class="p-4 px-7 flex items-center gap-2 p-4
                        {{ $topic === $t ? 'bg-[#6D9696] font-thin text-white' : 'bg-[#F1F2F3] font-thin text-[#54595F] hover:bg-[#6D9696] transition-colors duration-500 ease-out hover:text-white' }}">
                            <x-selectable-icons name="{{ normalizeTopic($t) }}" class="w-full h-full fill-current"/>
                            <h3 class="font-normal">{{ $t }}</h3>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Documentos filtrados por Subtema -->
        <div class="ml-10 flex-1 space-y-6">
            <!-- Filtro Abierto / Cerrado -->
            @php
            $hasOpen = $this->status === 'open' ? $this->documents->isNotEmpty() : File::query()
                ->whereHas('scopeRelation', fn($q) => $q->whereRaw('LOWER(name) = ?', [strtolower($scope)]))
                ->whereHas('theme', fn($q) => $q->whereRaw('LOWER(name) = ?', [strtolower($topic)]))
                ->whereRaw('? BETWEEN reopening_date AND closing_date', [now()->toDateString()])
                ->exists();

            $hasClosed = $this->status === 'closed' ? $this->documents->isNotEmpty() : File::query()
                ->whereHas('scopeRelation', fn($q) => $q->whereRaw('LOWER(name) = ?', [strtolower($scope)]))
                ->whereHas('theme', fn($q) => $q->whereRaw('LOWER(name) = ?', [strtolower($topic)]))
                ->whereRaw('? NOT BETWEEN reopening_date AND closing_date', [now()->toDateString()])
                ->exists();
            @endphp
            <div class="flex justify-end gap-3 mb-4">
                <button wire:click="setStatus('open')"
                        class="px-12 py-4 font-semibold flex items-center gap-2 p-4
                            {{ $status === 'open' ? 'bg-[#6D9696] font-thin text-white' : 'bg-gray-200 font-thin hover:bg-[#6D9696] transition-colors duration-500 ease-out hover:text-white' }}
                            {{ $hasOpen ? '' : 'invisible' }}">
                    <x-selectable-icons name="abierto" class="w-full h-full fill-current"/>
                    ABIERTO
                </button>
                <button wire:click="setStatus('closed')"
                        class="px-12 py-4 font-semibold flex items-center gap-2 p-4
                            {{ $status === 'closed' ? 'bg-[#6D9696] font-thin text-white' : 'bg-gray-200 font-thin hover:bg-[#6D9696] transition-colors duration-500 ease-out hover:text-white' }}
                            {{ $hasClosed ? '' : 'invisible' }}">
                    <x-selectable-icons name="cerrado" class="w-full h-full fill-current"/>
                    CERRADO
                </button>
            </div>

            @php
                // Agrupar documentos por subtema
                $grouped = $documents->groupBy(fn($doc) => $doc->subtheme?->name ?? 'Sin Subtema');
            @endphp

            @forelse($grouped as $subtheme => $docs)
                <h2 class="text-xl font-thin mb-2">{{ $subtheme }}</h2>

                @foreach($docs as $doc)
                    <a href="{{ asset('storage/' . $doc->pdf_path) }}" target="_blank" class="block">
                        <div class="p-4 mb-2 flex">
                            <x-pdf-icon class="flex-shrink-0"/>
                            <h3 class="font-semibold pl-2">{{ $doc->name }}</h3>
                        </div>
                    </a>
                @endforeach
            @empty
                <p class="italic text-gray-400">No hay documentos disponibles.</p>
            @endforelse
        </div>
    </div>
</div>
