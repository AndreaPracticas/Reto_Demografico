<div class="bg-transparent overflow-hidden w-full max-w-[320px] sm:max-w-[360px] lg:max-w-[420px] mx-auto">

  {{-- Imagen --}}
  <div class="overflow-hidden w-105 h-50">
  @if(isset($image))
    <img src="{{ $image }}" class="w-full h-full object-cover transition-transform duration-[1800ms] ease-in-out hover:scale-120">
  @endif
  </div>

  <div class="pt-4 w-105">

    <h3 class="font-semibold text-[19px]">
      {{ $title }}
    </h3>

    <p class="text-gray-700 font-light text-[15px]">
      {{ $description }}    
    </p>

  </div>

  <a 
    href="{{ $link }}" 
    class="block text-black font-bold text-right hover:underline transition pr-20 text-[15px] pt-2"
    >
    {{ $more }}
  </a>

</div>