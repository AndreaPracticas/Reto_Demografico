@extends('layouts.app')

@section('content')

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
</section>

@livewire('documents-filter', ['scope' => request('scope'), 'topic' => request('topic')])

@endsection
