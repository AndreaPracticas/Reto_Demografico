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

function renderSlides() {

    container.innerHTML = slides.map((slide, index) => `
        <div 
            class="absolute inset-0 transition-opacity duration-700 ease-in-out
            ${active === index ? 'opacity-100 z-10' : 'opacity-0 z-0'}"
        >
            <img 
                src="${slide}" 
                draggable="false"
                class="w-full h-full object-cover select-none 
                       transition-transform duration-[11000ms] ease-linear
                       ${active === index ? 'scale-110' : 'scale-100'}"
            >
        </div>
    `).join('');
}

renderSlides();

setInterval(() => {
    active = (active + 1) % slides.length;
    renderSlides();
}, 7000);
</script>
