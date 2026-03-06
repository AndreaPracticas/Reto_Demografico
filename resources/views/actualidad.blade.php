@extends('layouts.app')

@section('content')

<!-- Selector de ámbito -->
<section class="pt-22">

    <!-- Imagen -->
    <div class="bg-white items-center justify-center h-110 ">
        <img 
            src="/storage/news/Actualidad.png" 
            alt="Actualidad"
            class="w-full h-full object-cover">
    </div>

    <div class="grid grid-cols-3 mb-6">
        @foreach(['noticias','experiencias','actividades'] as $s)
            <button class="p-6 font-semibold text-center bg-[#E2E2E2] text-[33px]" onclick="document.getElementById('{{ $s }}').scrollIntoView({ behavior: 'smooth' })">
                {{ ucfirst($s) }}
            </button>
        @endforeach
    </div>
</section>

<!-- Noticias -->
<section>
    <h3 id="noticias" class="font-semibold text-[32px] ml-43 mt-23 mb-25">Noticias</h3>
    <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 lg:grid-cols-3 gap-1 ml-40 mr-40 justify-items-center">
        @forelse($noticias as $item)
            <x-news-card 
                :title="$item->title"
                :description="$item->description"
                :image="$item->image ? asset('storage/'.$item->image) : null"
                more="Ir—"
                :link="$item->link ?? null"
            />
        @empty
            <p class="col-span-3 text-center text-gray-500">
                No hay noticias disponibles.
            </p>
        @endforelse
    </div>
</section>
<!-- Experiencias realizadas -->
<section>
    <div id="experiencias" class="leading-tight text-left pb-15 pt-20 ml-43 ">
        <h1 class="text-black font-semibold text-[32px]">
            Experiencias 
        </h1>
        <p class="text-black font-light text-lg tracking-wide text-[32px]">
            Realizadas
        </p>
    </div>
    <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 lg:grid-cols-3 gap-1 ml-40 mr-40 justify-items-center">
        @forelse($experiencias as $item)
            <x-news-card
                :title="$item->title"
                :description="$item->description"
                :image="$item->image ? asset('storage/'.$item->image) : null"
                more="Ir—"
                :link="$item->link ?? null"
            />
        @empty
            <p class="col-span-3 text-center text-gray-500">
                No hay experiencias disponibles.
            </p>
        @endforelse
    </div>
</section>
 <!-- Enlaces de interés -->
<section>
    <div id="enlaces" class="leading-tight text-left pb-15 pt-20 ml-43 ">
        <h1 class="text-black font-semibold text-[32px]">
            Enlaces
        </h1>
        <p class="text-black font-semibold text-lg tracking-wide text-[32px]">
            De Interés
        </p>
    </div>
    <div class="w-full flex justify-end">
        <a href="https://www.linkedin.com/feed/update/urn:li:activity:7370779827823542272">
            <div class="text-[#07034C] mr-3 flex gap-1 mr-30">
                <x-selectable-icons name="linkedin" class="w-full h-full fill-current"/>
                <p>INECO</p>
            </div>
        </a>
    </div>
    <div class="mt-15 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-2 gap-1 ml-40 mr-40 items-stretch">
        @forelse($enlaces as $item)
            <x-links-card
                :title="$item->title"
                :description="$item->description"
                :image="$item->image ? asset('storage/'.$item->image) : null"
                more="Ir—"
                :link="$item->link ?? null"
            />
        @empty
            <p class="col-span-2 text-center text-gray-500">
                No hay enlaces disponibles.
            </p>
        @endforelse
        <div class="w-full aspect-video">
            <iframe
                class="w-full h-full"
                src="https://www.youtube.com/embed/mnZssfImspE"
                title="Video de YouTube"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</section>
<!-- Actividades -->
<section>
     <h3 id="actividades" class="font-semibold text-[32px] ml-43 mt-23 mb-25">Actividades</h3>
</section>
@endsection