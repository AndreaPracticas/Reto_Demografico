<div id="navbar" class="absolute inset-x-0 z-50 bg-black/5 transition-all duration-1000">

    <div class="max-w-7xl mx-auto px-4">

        <div class="flex justify-center items-center h-21 md:h-21 ">

        <!-- DESKTOP MENU -->

        <nav class="hidden lg:block">

            <ul class="flex items-center gap-9 text-sm font-principal pt-3 text-[19px] tracking-wide text-[#4C555C]">

<!-- INICIO -->

<li>
<a href="{{ url('/') }}"
class="relative  py-2 text-[#1F2124] transition
after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-0 after:h-[1px] after:w-0 after:bg-white after:transition-all after:duration-300 hover:after:w-full">
Inicio
</a>
</li>

<!-- HERRAMIENTAS -->

<li class="relative group">

<button
class="flex items-center gap-1 py-2 text-[#1F2124] transition
relative after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-0 after:h-[1px] after:w-0 after:bg-white after:transition-all after:duration-300 group-hover:after:w-full">

Herramientas de análisis

<svg class="w-3 h-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
<path d="M5.23 7.21L10 12l4.77-4.79"/>
</svg>

</button>

<ul class="absolute top-full left-0 hidden group-hover:block bg-white shadow-lg rounded-md min-w-[220px] py-2 z-40">

<li>
<a href="{{ url('/observatorio#analisis') }}"
class="block px-4 py-2 hover:bg-gray-100">
Análisis por ámbitos
</a>
</li>

<li>
<a href="https://retodemografico.sitcan.es/"
target="_blank"
class="block px-4 py-2 hover:bg-gray-100">
Visor
</a>
</li>

</ul>

</li>

<!-- AYUDAS -->

<li class="relative group">

<button
class="flex items-center gap-1 py-2 text-[#1F2124] transition
relative after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-0 after:h-[1px] after:w-0 after:bg-white after:transition-all after:duration-300 group-hover:after:w-full">

Ayudas y subvenciones

<svg class="w-3 h-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
<path d="M5.23 7.21L10 12l4.77-4.79"/>
</svg>

</button>

<ul class="absolute top-full left-0 hidden group-hover:block bg-white shadow-lg rounded-md min-w-[220px] py-2 z-40">

<li><a href="{{ url('/europeas') }}" class="block px-4 py-2 hover:bg-gray-100">Europeas</a></li>
<li><a href="{{ url('/regionales') }}" class="block px-4 py-2 hover:bg-gray-100">Regionales</a></li>
<li><a href="{{ url('/nacionales') }}" class="block px-4 py-2 hover:bg-gray-100">Nacionales</a></li>

</ul>

</li>

<!-- ESTRATEGIA -->

<li>
<a href="{{ url('/observatorio#estrategia') }}"
class="relative py-2 text-[#1F2124] transition
after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-0 after:h-[1px] after:w-0 after:bg-white after:transition-all after:duration-300 hover:after:w-full">
Estrategia
</a>
</li>

<!-- ACTUALIDAD -->

<li class="relative group">

<button
class="flex items-center gap-1 py-2 text-[#1F2124] transition
relative after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-0 after:h-[1px] after:w-0 after:bg-white after:transition-all after:duration-300 group-hover:after:w-full">

Actualidad

<svg class="w-3 h-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
<path d="M5.23 7.21L10 12l4.77-4.79"/>
</svg>

</button>

<ul class="absolute top-full left-0 hidden group-hover:block bg-white shadow-lg rounded-md min-w-[240px] py-2 z-40">

<li><a href="{{ url('/actualidad#noticias') }}" class="block px-4 py-2 hover:bg-gray-100">Noticias</a></li>
<li><a href="{{ url('/actualidad#experienciasrealizadas') }}" class="block px-4 py-2 hover:bg-gray-100">Experiencias realizadas</a></li>
<li><a href="{{ url('/actualidad#enlacesdeinteres') }}" class="block px-4 py-2 hover:bg-gray-100">Enlaces de interés</a></li>
<li><a href="{{ url('/actualidad#actividades') }}" class="block px-4 py-2 hover:bg-gray-100">Actividades</a></li>

</ul>

</li>

<!-- OFICINA -->

<li>
<a href="https://ovrd.org"
target="_blank"
class="relative py-2 text-[#1F2124] transition
after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-0 after:h-[1px] after:w-0 after:bg-white after:transition-all after:duration-300 hover:after:w-full">
Oficina Virtual
</a>
</li>

<!-- CONGRESO -->

<li>
<a href="https://congresoretodemograficogobcan.org/"
target="_blank"
class="relative py-2 text-[#1F2124] transition
after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-0 after:h-[1px] after:w-0 after:bg-white after:transition-all after:duration-300 hover:after:w-full">
I Congreso Reto Demográfico
</a>
</li>

</ul>

</nav>

<!-- BURGER BUTTON -->

<button id="burgerBtn" class="lg:hidden bg-white rounded-md ml-auto">

<svg id="burgerOpen" class="w-7 h-7 p-1" fill="none" stroke="currentColor" stroke-width="2"
viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round"
d="M4 6h16M4 12h16M4 18h16"/>
</svg>

<svg id="burgerClose" class="w-7 h-7 hidden p-1" fill="none" stroke="currentColor" stroke-width="2"
viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round"
d="M6 18L18 6M6 6l12 12"/>
</svg>

</button>

</div>
</div>
</div>

<!-- MOBILE MENU -->

<div id="mobileMenu"
class="fixed top-[calc(5rem+6rem)] right-0 w-full max-h-[calc(100vh-4rem)] bg-white shadow-xl origin-top scale-y-0 invisible opacity-0 transition-all duration-500 lg:hidden z-40 overflow-y-auto">

<ul class="flex flex-col divide-y">

<li><a class="block px-4 py-3 hover:bg-gray-100" href="{{ url('/') }}">Inicio</a></li>

<li>
<button class="w-full text-left px-4 py-3 font-medium mobile-toggle">
Herramientas de análisis
</button>

<div class="hidden flex flex-col">
<a class="px-6 py-2 hover:bg-gray-100" href="{{ url('/observatorio#analisis') }}">Análisis por ámbitos</a>
<a class="px-6 py-2 hover:bg-gray-100" target="_blank" href="https://retodemografico.sitcan.es/">Visor</a>
</div>
</li>

<li>
<button class="w-full text-left px-4 py-3 font-medium mobile-toggle">
Ayudas y subvenciones
</button>

<div class="hidden flex flex-col">
<a class="px-6 py-2 hover:bg-gray-100" href="{{ url('/europeas') }}">Europeas</a>
<a class="px-6 py-2 hover:bg-gray-100" href="{{ url('/regionales') }}">Regionales</a>
<a class="px-6 py-2 hover:bg-gray-100" href="{{ url('/nacionales') }}">Nacionales</a>
</div>
</li>

<li><a class="block px-4 py-3 hover:bg-gray-100" href="{{ url('/observatorio#estrategia') }}">Estrategia</a></li>

<li>
<button class="w-full text-left px-4 py-3 font-medium mobile-toggle">
Actualidad
</button>

<div class="hidden flex flex-col">
<a class="px-6 py-2 hover:bg-gray-100" href="{{ url('/actualidad#noticias') }}">Noticias</a>
<a class="px-6 py-2 hover:bg-gray-100" href="{{ url('/actualidad#experienciasrealizadas') }}">Experiencias realizadas</a>
<a class="px-6 py-2 hover:bg-gray-100" href="{{ url('/actualidad#enlacesdeinteres') }}">Enlaces de interés</a>
<a class="px-6 py-2 hover:bg-gray-100" href="{{ url('/actualidad#actividades') }}">Actividades</a>
</div>
</li>

<li><a class="block px-4 py-3 hover:bg-gray-100" target="_blank" href="https://ovrd.org">Oficina Virtual</a></li>

<li><a class="block px-4 py-3 hover:bg-gray-100" target="_blank" href="https://congresoretodemograficogobcan.org/">I Congreso Reto Demográfico</a></li>

</ul>

</div>

<!-- MENU SCRIPT -->

<script>
const burgerBtn = document.getElementById('burgerBtn')
const mobileMenu = document.getElementById('mobileMenu')
const openIcon = document.getElementById('burgerOpen')
const closeIcon = document.getElementById('burgerClose')

burgerBtn.addEventListener('click', () => {

mobileMenu.classList.toggle('scale-y-0')
mobileMenu.classList.toggle('invisible')
mobileMenu.classList.toggle('opacity-0')
openIcon.classList.toggle('hidden')
closeIcon.classList.toggle('hidden')
document.body.classList.toggle('overflow-hidden')

})

document.querySelectorAll('.mobile-toggle').forEach(btn => {
btn.addEventListener('click', () => {
btn.nextElementSibling.classList.toggle('hidden')
})
})

// INTELLIGENT NAVBAR

const navbar = document.getElementById('navbar')

window.addEventListener('scroll', () => {

if (window.scrollY > 10) {

navbar.classList.remove('absolute')
navbar.classList.add('fixed', 'top-0')

navbar.classList.remove('bg-black/5')
navbar.classList.add('bg-[#EEEEEE]')

} else {

navbar.classList.remove('fixed', 'top-0')
navbar.classList.add('absolute', 'top-[calc(3rem+3rem)]')

navbar.classList.remove('bg-[#EEEEEE]')
navbar.classList.add('bg-black/5')

}

})
</script>
