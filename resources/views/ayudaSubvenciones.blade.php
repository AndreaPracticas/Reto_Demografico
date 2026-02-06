@extends('layouts.app')

@section('content')

@php
    $scope = request('scope');
@endphp

<!-- Selector de ámbito -->
<section class="space-y-6 pt-22">

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

    <!-- Selector -->
    <div class="grid grid-cols-3">
        @foreach (['regional','national','european'] as $s)
            <button
                hx-get="/ayudasysubvenciones/filter?scope={{ $s }}"
                hx-target="#content"
                hx-swap="innerHTML"
                class="
                    px-6 py-3
                    text-sm font-medium
                    transition
                    {{ $scope === $s 
                        ? 'bg-[#E2E2E2] text-black shadow-lg' 
                        : 'bg-white text-gray-700'
                    }}
                ">
                {{ ucfirst($s) }}
            </button>
        @endforeach
    </div>
</section>

<div class="pt-24 px-6 max-w-7xl mx-auto space-y-10">

    <section class="text-center max-w-3xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">
            Ayudas y Subvenciones
        </h1>
    </section>

    <!-- Selector de temáticas -->
    <section class="grid grid-cols-1 gap-4">
        @foreach ([
            'Agenda 2030',
            'Agua y Energía',
            'Cultura',
            'Economía y Empleo',
            'Planificación',
            'Recuperación',
            'Transición ecológica'
        ] as $topic)
            <button
                hx-get="/ayudasysubvenciones/filter?scope={{ $scope }}&topic={{ urlencode($topic) }}"
                hx-target="#content"
                hx-swap="innerHTML"
                class="
                    p-5 rounded-xl
                    bg-blue-50 hover:bg-blue-100
                    text-left
                    transition
                ">
                <h3 class="font-medium text-blue-900">
                    {{ $topic }}
                </h3>
            </button>
        @endforeach
    </section>

    <!-- Div dinámico -->
    <section
        id="content"
        class="min-h-[200px]"
        @if($scope)
            hx-get="/ayudasysubvenciones/filter?scope={{ $scope }}"
            hx-trigger="load"
            hx-swap="innerHTML"
        @endif
    >
        <p class="italic text-gray-400">
            Selecciona una temática para ver los documentos disponibles.
        </p>
    </section>

</div>

@endsection
