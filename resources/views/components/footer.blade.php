<footer class="py-9 bg-[#2F2F2F] text-sm text-white">
    <div class="container mx-auto flex justify-between items-start px-6">

        <!-- COLUMNA IZQUIERDA -->
        <div class="flex flex-col gap-y-4 max-w-md">

            <img 
                src="{{ asset('images/logos-footer/logos-web-congreso-2048x218.png') }}"
                alt="Logo Gobierno de Canarias"
                class="h-14 md:h-15 lg:h-15 w-auto max-w-full"
            >

            <div class="text-xs leading-relaxed text-left text-[14px]">
                <p class="font-semibold">Contacto</p>
                <p class="text-[#707A7A]">
                    <a>
                        info@retodemograficogobcan.org
                    </a>
                </p>
                <p class="mt-4 font-semibold">
                    Gesplan - Gestión y Planeamiento Territorial y Medio Ambiental S.A.
                </p>
                <p class="text-[#707A7A]">Calle León y Castillo, 54 Bajo</p>
                <p class="text-[#707A7A]">Las Palmas de Gran Canaria</p>

                <p class="mt-3 text-[#707A7A]">
                    Residencial Amarca, Avda. Tres de Mayo 71, local bajo A
                </p>
                <p class="text-[#707A7A]">Santa Cruz de Tenerife</p>
            </div>
        </div>

        <!-- COLUMNA DERECHA -->
        <div class="flex flex-col gap-y-4 max-w-md">

            <!-- Enlaces legales -->
            <div class="flex items-center gap-x-2 text-xs md:text-sm mt-10">
                <a href="https://retodemograficogobcan.org/aviso-legal/" class="hover:underline">
                    Aviso Legal
                </a>
                <span>|</span>
                <a href="https://retodemograficogobcan.org/politica-de-privacidad/" class="hover:underline">
                    Política de Privacidad
                </a>
                <span>|</span>
                <a href="https://retodemograficogobcan.org/politica-de-cookies/" class="hover:underline">
                    Política de Cookies
                </a>
            </div>

            <!-- IMAGEN INFERIOR DERECHA -->
            <img
                src="{{ asset('images/logos-footer/Logo_footer_1.png') }}"
                alt="Logo institucional"
                class="h-35 w-auto object-contain mt-6"
            >
        </div>
    </div>
</footer>
