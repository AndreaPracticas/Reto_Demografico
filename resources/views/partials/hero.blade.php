<section 
    id="heroSlider"
    class="relative w-full h-screen md:h-[650px] lg:h-[650px] overflow-hidden font-principal"
>

    <!-- SLIDES -->
    <div id="slides-container" class="absolute inset-0"></div>

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/30 pointer-events-none"></div>

    <!-- HERO TEXT -->
    <div class="absolute inset-0 flex items-center justify-left sm:pl-10 md:pl-20 lg:pl-30 text-center px-4 z-20">
        <div class="leading-tight text-left border-l-[6px] sm:border-l-[7px] md:border-l-[8px] lg:border-l-[10px] border-[#F7C060] pl-4 ">
            <h1 class="text-white font-bold uppercase tracking-widest text-5xl sm:text-6xl md:text-6xl lg:text-6xl drop-shadow">
                RETO DEMOGRÁFICO
            </h1>

            <p class="text-white/90 font-light text-lg tracking-wide text-5xl sm:text-3xl sm:text-6xl lg:text-6xl mt-1">
                Y COHESIÓN
            </p>

            <h1 class="text-white font-bold uppercase tracking-widest text-5xl sm:text-6xl md:text-6xl lg:text-6xl mt-1 drop-shadow">
                TERRITORIAL
            </h1>
        </div>
    </div>

</section>
<script>
const slides = [
    '/images/hero/ehalta-scaled.jpg',
    '/images/hero/ftvalta-scaled.jpg',
    '/images/hero/granalta-scaled.jpg',
    '/images/hero/loalta-scaled.jpg',
    '/images/hero/lpalta-scaled.jpg',
    '/images/hero/tfalta-scaled.jpg'
];

let active = 0;
const container = document.getElementById('slides-container');

// Crear todos los slides una sola vez
slides.forEach((slide, index) => {
    const div = document.createElement('div');
    div.className = `absolute inset-0 transition-opacity duration-1000 ease-in-out ${index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'}`;
    
    const img = document.createElement('img');
    img.src = slide;
    img.draggable = false;
    img.className = 'w-full h-full object-cover select-none transition-transform duration-[7000ms] ease-linear scale-100';
    
    div.appendChild(img);
    container.appendChild(div);
});

// Arrancar zoom de la primera imagen
requestAnimationFrame(() => {
    requestAnimationFrame(() => {
        container.children[0].querySelector('img').classList.replace('scale-100', 'scale-110');
    });
});

function goTo(next) {
    const divs = container.children;
    const imgs = Array.from(divs).map(d => d.querySelector('img'));

    // Ocultar actual
    divs[active].classList.replace('opacity-100', 'opacity-0');
    divs[active].classList.replace('z-10', 'z-0');
    imgs[active].classList.replace('scale-110', 'scale-100');

    active = next;

    // Mostrar siguiente
    divs[active].classList.replace('opacity-0', 'opacity-100');
    divs[active].classList.replace('z-0', 'z-10');

    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            imgs[active].classList.replace('scale-100', 'scale-110');
        });
    });
}

setInterval(() => {
    goTo((active + 1) % slides.length);
}, 7000);
</script>
