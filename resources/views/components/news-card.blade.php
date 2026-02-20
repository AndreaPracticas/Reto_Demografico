<div class="bg-transparent mb-3 shadow-[0_2px_12px_rgba(0,0,0,0.4)] overflow-hidden w-full max-w-[320px] sm:max-w-[360px] lg:max-w-[380px]">

  {{-- Imagen --}}
  <div class="overflow-hidden w-105 h-50">
  @if(isset($image))
    <img src="{{ $image }}" class="w-full h-full object-cover transition-transform duration-[1800ms] ease-in-out hover:scale-120">
  @endif
  </div>

  <div class="p-5">
    <div class="pt-2 w-auto">

      <h3 class="font-semibold text-[17px]">
        {{ $title }}
      </h3>

      <p class="text-gray-700 font-light text-[15px] pt-5">
        {{ $description }}    
      </p>

    </div>

    <a 
      href="{{ $link }}" 
      class="block text-black font-bold text-right text-[15px] pt-2"
      >
      {{ $more }}
    </a>
  </div>

</div>