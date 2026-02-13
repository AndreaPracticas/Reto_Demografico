@extends('layouts.app')

@section('content')

@php
    $scope = request('scope');
    $topic = request('topic');

    $topics = [
        'Agenda 2030',
        'Agua y Energía',
        'Cultura',
        'Economía y Empleo',
        'Planificación',
        'Recuperación',
        'Transición ecológica'
    ];
@endphp

<!-- Selector de ámbito -->
<section class="pt-22">

    <!-- Imagen -->
    <div class="grid grid-cols-3 gap-1 bg-white">
        <div class="h-110 flex items-center justify-center">
            <img 
                src="/images/as/AS_C-300x300 (1).png" 
                alt="Ayudas y subvenciones"
                class="w-80 h-auto object-contain">
        </div>
        <div class="h-110 flex items-center justify-center">
            <img 
                src="/images/as/AS_E-300x300.png" 
                alt="Ayudas y subvenciones"
                class="w-80 h-auto object-contain">
        </div>
        <div class="h-110 flex items-center justify-center">
            <img 
                src="/images/as/AS_EU-300x300 (1).png" 
                alt="Ayudas y subvenciones"
                class="w-80 h-auto object-contain">
        </div>
    </div>

    <!-- Selector Scope -->
    <div class="flex gap-2 mb-6 mt-6">
         @foreach(['regionales','nacionales','europeas'] as $s)
            <a href="{{ route('ayudasysubvenciones', ['scope' => $s, 'topic' => $topic ?? null]) }}"
            class="scope-btn px-4 py-2 rounded-lg font-semibold
                    {{ ($scope ?? '') === $s ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-800' }}"
            data-scope="{{ $s }}">
                {{ ucfirst($s) }}
            </a>
        @endforeach
    </div>
</section>

<section class="pt-24 px-6 max-w-7xl mx-auto space-y-10">

    <section class="text-center max-w-3xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">
            Ayudas y Subvenciones
        </h1>
    </section>

    <!-- Selector Topics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @foreach($topics as $t)
            <a href="{{ route('ayudasysubvenciones', ['scope' => $scope ?? null, 'topic' => $t]) }}"
            class="topic-btn p-5 rounded-xl text-left
                    {{ $topic === $t ? 'bg-blue-500 text-white shadow-lg' : 'bg-blue-50 hover:bg-blue-100' }}"
            data-topic="{{ $t }}">
                {{ $t }}
            </a>
        @endforeach
    </div>

    <!-- Contenedor dinámico -->
    <div id="content" class="min-h-[200px]">
        @if($documents->isEmpty())
            <p class="italic text-gray-400">No hay documentos disponibles para este filtro.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($documents as $doc)
                    <div class="p-4 border rounded-lg bg-white shadow-sm">
                        <h3 class="font-semibold text-lg">{{ $doc->name }}</h3>
                        @if($doc->pdf_path)
                            <a href="{{ asset('storage/' . $doc->pdf_path) }}" target="_blank" class="text-blue-600 underline">Ver PDF</a>
                        @endif
                        <p class="text-gray-700 mt-2">{{ $doc->description ?? 'Sin descripción' }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</section>

<!-- Script para marcar botones activos -->
<script>
    function updateActiveButtons() {
        const url = new URL(window.location.href);
        const currentScope = url.searchParams.get('scope');
        const currentTopic = url.searchParams.get('topic');

        document.querySelectorAll('.scope-btn').forEach(btn => {
            btn.classList.remove('bg-orange-500', 'text-white');
            btn.classList.add('bg-gray-200');
            if (btn.dataset.scope === currentScope) {
                btn.classList.add('bg-orange-500', 'text-white');
                btn.classList.remove('bg-gray-200');
            }
        });

        document.querySelectorAll('.topic-btn').forEach(btn => {
            btn.classList.remove('shadow-lg');
            if (btn.dataset.topic === currentTopic) {
                btn.classList.add('shadow-lg');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', updateActiveButtons);
</script>

@endsection
