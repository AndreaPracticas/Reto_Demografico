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
    <!-- Mujeres rurales frente a la inteligencia artificial generativa -->
    <div class="w-[1281px] mx-auto mt-25">
        <div class="flex flex-col md:flex-row w-full p-10 gap-3">
        
            <!-- Imagen izquierda -->
            <div class="w-full md:w-1/2">
                <img 
                    src="{{ asset('storage/news/MujeresvsIA.png') }}" 
                    alt="Mujeres rurales frente a la inteligencia artificial generativa"
                    class="w-full h-full"
                >
            </div>

            <!-- Contenido derecho -->
            <div class="w-full md:w-1/2 flex flex-col">
                
                <!-- Cabecera — imagen a ancho completo -->
                <img 
                    src="{{ asset('storage/news/MujeresvsIA2.png') }}" 
                    alt="Cabecera"
                    class="w-full h-25"
                >

                <!-- Links -->
                <ul class="flex flex-col gap-2 text-[#06073F] text-[15px]">
                    <li class="flex items-start gap-3 hover:text-blue-900">
                        <x-selectable-icons name="enlace" class="w-6 h-6 text-blue-600" />
                        <a href="https://blogs.uned.es/mujerrural-iahu/" target="_blank" class="text-[17px]" style="font-weight: 500;">
                            Mujeres rurales frente a la inteligencia artificial generativa (MujerRural-IAHu)
                        </a>
                    </li>
                    <li class="flex items-start gap-3 hover:text-blue-900">
                        <x-selectable-icons name="pdf" class="w-3 h-3 text-blue-600" />
                        <a href="https://blogs.uned.es/mujerrural-iahu/programa-formativo/" target="_blank" class="text-[17px]" style="font-weight: 500;">
                            Programa formativo
                        </a>
                    </li>
                    <li class="flex items-start gap-3 hover:text-blue-900">
                        <x-selectable-icons name="cuestionario" class="w-3 h-3 text-blue-600" />
                        </svg>
                        <a href="https://forms.office.com/pages/responsepage.aspx?id=SHBYtXCgrUO2VCCjHpstmTWrvPq-IchIt80-cFOkX8JUQ1gzU1FYR1dVQVo0WEFOMTNBQVpLQ1kzVS4u&route=shorturl" target="_blank" class="text-[17px]" style="font-weight: 500;">
                            Cuestionario interés y conocimientos previos: Mujeres rurales frente a la IA
                        </a>
                    </li>
                    <li class="flex items-start gap-3 hover:text-blue-900">
                        <x-selectable-icons name="entrevista" class="w-3 h-3 text-blue-600" />
                        <a href="https://forms.office.com/pages/responsepage.aspx?id=SHBYtXCgrUO2VCCjHpstmTWrvPq-IchIt80-cFOkX8JURDI4WFdQN1hDRlpEUlFVOUZCNEtGMzFVVC4u&route=shorturl" target="_blank" class="text-[17px]" style="font-weight: 500;">
                            Entrevista municipios y asociaciones: Mujer rural e IAG (noviembre 2025)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Actividades -->
<section>
     <h3 id="actividades" class="font-semibold text-[32px] ml-43 mt-23 mb-25">Actividades</h3>
</section>
@endsection