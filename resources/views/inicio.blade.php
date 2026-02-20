@extends('layouts.app')

@section('title', 'Reto Demográfico')

@section('content')
    @include('partials.hero')
    <!-- Observatorio Reto Demográfico -->
    <section class="container mx-auto pt-45 pb-30">
        <div class="leading-tight text-left pl-15 ">
            <h1 class="text-black font-bold uppercase text-4xl sm:text-4xl md:text-4xl lg:text-4xl">
                OBSERVATORIO
            </h1>

            <p class="text-black font-light text-lg tracking-wide text-4xl sm:text-4xl md:text-4xl lg:text-4xl mt-1">
                Reto Demográfico
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-20 pl-15 pr-15 justify-items-center sm:justify-items-center lg:justify-items-stretch">
            <x-card 
            title="Herramientas de análisis"
            description="Consulte los datos de la Estrategia Canaria de Reto Demográfico y Cohesión Territorial."
            image="{{ asset('images/cards/Analisis_datos.png') }}"
            more="Más---"
            link="#"
            />
            <x-card 
            title="Ayudas y Subvenciones"
            description="Información sobre ayudas y subvenciones publicadas a nivel europeo, estatal y regional."
            image="{{ asset('images/cards/Ayudas_1-1024x444.png') }}"
            more="Más---"
            link="#"
            />
            <x-card 
            title="Estrategia"
            description="Conozca la Estrategia Canaria de Reto demográfico y Cohesión Territorial."
            image="{{ asset('images/cards/estrategia.png') }}"
            more="Más---"
            link="#"
            />
        </div>
    </section>
    <!-- Herramientas de análisis -->
    <img
            src="{{ asset('images/Visor_3-2048x1008.png') }}" 
            alt="Logos Reto Demográfico" 
            class="w-full h-auto mt-30"
        >
    <section id="analisis" class="py-23 px-45 pb-20">
        <div class="leading-tight text-left pb-15 pt-20 ">
            <h1 class="text-black font-bold text-4xl sm:text-4xl md:text-4xl lg:text-4xl">
                Herramientas de 
            </h1>

            <p class="text-black font-light text-lg tracking-wide text-4xl sm:text-4xl md:text-4xl lg:text-4xl mt-1">
                Análisis
            </p>
        </div>
        <div class="flex flex-col md:flex-row font-light text-gray-700 text-[16px] ">
            <div class="flex-1 pr-10">
                <p>
                    En esta sección de herramientas de ánalisis del Observatorio, 
                    se pone a disposición del público un punto de encuentro donde 
                    consultar la información generada en el marco de la Estrategia 
                    Canaria de Reto Demográfico y Cohesión Territorial, con un enfoque 
                    basado en indicadores clave.
                </p>
                <br>
                <p>
                    Para ello, se ofrecen dos opciones de consulta: por un lado, 
                    una herramienta interactiva que permite el análisis de datos por 
                    ámbitos temáticos, ofreciendo la posibilidad de filtrar la información 
                    a nivel municipal, para una visión más detallada. Por otro, el visor 
                    de indicadores, un instrumento de diagnóstico innovador que facilita 
                    un acceso transparente a la información clave, permitiendo realizar 
                    búsquedas más personalizadas y mejorando la toma de decisiones basada 
                    en datos actualizados.
                </p>
            </div>
            <div class="flex-1 pl-4 md:border-l-8 lg:pl-10 lg:border-l-8 border-orange-400 sm:mt-10 md:mt-0">
                <div>
                    <h1 class="font-semibold tracking-wide text-[20px] hover:scale-105 transition-transform duration-500 ease-in-out">Análisis por ámbitos</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 gap-y-8 mt-4 mb-6 text-gray-700 text-[16px]">
                        <a href="https://retodemografico.sitcan.es/tpb/" target="_blank">
                        <div>
                            <h2 class="font-semibold text-[#63B44B]">Ámbito (TPB)</h2>
                            <p>
                            Patrimonio Natural: Territorio Paisaje y Biodiversidad
                            </p>
                        </div>
                        </a>
                        <a href="https://retodemografico.sitcan.es/pc/" target="_blank">
                        <div>
                            <h2 class="font-semibold text-[#614494]">Ámbito (PC)</h2>
                            <p>
                            Patrimonio Cultural
                            </p>
                        </div>
                        </a><a href="https://retodemografico.sitcan.es/gces/" target="_blank">
                        <div>
                            <h2 class="font-semibold text-[#A32053]">Ámbito (GCES)</h2>
                            <p>
                            Gobernanza y Cohesión <br> Económica y Social
                            </p>
                        </div>
                        </a><a href="https://retodemografico.sitcan.es/cmt/" target="_blank">
                        <div>
                            <h2 class="font-semibold text-[#F79E2B]">Ámbito (CMT)</h2>
                            <p>
                            Cohesión del Modelo <br> Territorial
                            </p>
                        </div>
                        </a>
                    </div>
                </div>
                <div>
                    <h1 class= "font-semibold tracking-wide text-[20px] pb-2 hover:scale-105 transition-transform duration-500 ease-in-out">Visor</h1>
                    <p>
                    Realiza una consulta personalizada a través de la herramienta interactiva.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Ayudas y Subvenciones -->
    <img
        src="{{ asset('images/Ayudas@300x-2048x1005.png') }}" 
        alt="Ayudas" 
        class="w-full h-auto mt-30"
    >
    <section class="px-45 pb-15 pt-17">
        <div class="leading-tight text-left pb-19 pt-20 ">
            <h1 class="text-black font-bold text-3xl sm:text-4xl md:text-4xl lg:text-4xl">
                Ayudas
            </h1>

            <p class="text-black font-light text-lg tracking-wide text-4xl sm:text-4xl md:text-4xl lg:text-4xl mt-1">
                y Subvenciones
            </p>
        </div>
        <div class="flex flex-col md:flex-row font-light text-gray-700 text-[16px] gap-25">
            <div class="flex-1 ">
                <p>
                    En esta sección del Observatorio, se ofrece a las instituciones y 
                    a la ciudadanía en general, información y acceso a las ayudas y 
                    subvenciones publicadas a nivel europeo, estatal y regional.
                </p>
                <br>
                <p>
                    Estas convocatorias, con impacto directo o indirecto en el Reto Demográfico,
                    abarcan diversas temáticas como biodiversidad, cambio climático, economía circular,
                    planeamiento, movilidad, Agenda 2030, cultura, entre otras.
                </p>
            </div>
            <div class="font-normal flex gap-23 mt-6">
                <a hreft="#">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('images/flags/Bandera_C.png') }}" 
                    class="w-37 h-auto object-cover border border-gray-300/40
                    hover-pulse">
                    <h2 class="mt-2 text-[19px]">Regionales</h2>
                </div>
                </a><a hreft="#">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('images/flags/Bandera_E.png') }}" 
                    class="w-37 h-auto object-cover border border-gray-300/40
                    hover-pulse">
                    <h2 class="mt-2 text-[19px]">Nacionales</h2>
                </div>
                </a><a hreft="#">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('images/flags/Bandera_EU.png') }}" 
                    class="w-37 h-auto object-cover border border-gray-300/40
                    hover-pulse">
                    <h2 class="mt-2 text-[19px]">Europeas</h2>
                </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Estrategia -->
    <img
        src="{{ asset('images/Estrategia-2048x1009.png') }}" 
        alt="Ayudas" 
        class="w-full h-auto mt-30"
    >
    <section id="estrategia" class="px-45 pb-30 pt-17">
        <div class="leading-tight text-left pb-19 pt-20 ">
            <h1 class="text-black font-bold text-3xl sm:text-4xl md:text-4xl lg:text-4xl">
                Estrategia
            </h1>
        </div>
        <div>
            <!-- Que es reto demográfico? -->
            <div class="font-light text-[16px] pb-1">
                <button 
                    class="w-full flex items-center pl-2 text-left toggle-btn gap-x-3"
                    onmouseover="this.querySelector('svg').style.opacity='0.6'"
                    onmouseout="this.querySelector('svg').style.opacity='1'">
                    <x-orange-square-icon/>
                     ¿Qué es<b>Reto demográfico?</b>
                </button>
                <div class="content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-5 ml-14 mb-4">
                    <div class="overflow-hidden">
                        <p class="pt-5">
                            El reto demográfico es uno de los principales desafíos actuales, 
                            con impactos que van más allá del crecimiento o disminución de la 
                            población, afectando al desarrollo social, económico y territorial. 
                            Este fenómeno se manifiesta en dos tendencias opuestas: la despoblación de 
                            las zonas rurales, marcada por el envejecimiento y la baja natalidad; 
                            y la concentración urbana, que genera presión sobre infraestructuras y recursos. 
                        </p>
                        <br>
                        <p>
                            En Canarias, esta problemática adquiere una dimensión particular debido a su fragmentación 
                            territorial y condición de región ultraperiférica. La alta densidad en áreas urbanas y 
                            turísticas contrasta con el estancamiento y la despoblación de zonas rurales, lo que 
                            plantea serios desafíos en empleo, cohesión social y sostenibilidad. Para hacer frente 
                            a estos retos, se ha desarrollado la Estrategia Canaria de Reto Demográfico y Cohesión 
                            Territorial (ECan RetoyCohesión), que busca una respuesta adaptada a las particularidades 
                            de cada isla.
                        </p>
                        <br>
                        <p class="pb-5">
                            Su objetivo es <u> promover un desarrollo equilibrado 
                            mediante la cooperación institucional y social, políticas 
                            compensatorias para las islas más afectadas, la protección del medio 
                            ambiente y la mejora de la competitividad económica y la calidad del empleo.</u>
                        </p>
                    </div>
                </div>
            </div>
            <!-- ¿Cuáles son los espacios de la demografía en Canarias? -->
            <div class="font-light text-[16px] pb-1">
                <button 
                    class="w-full flex items-center pl-2 text-left toggle-btn gap-x-3"
                    onmouseover="this.querySelector('svg').style.opacity='0.6'"
                    onmouseout="this.querySelector('svg').style.opacity='1'">
                    <x-orange-square-icon/>
                     ¿Cuáles son los <b>espacios de la demografía</b> en Canarias? 
                </button>
                <div class="content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-5 ml-14 mb-4">
                    <div class="overflow-hidden">
                        <ul class="list-disc list-inside ml-14 pt-5">
                            <li>Características para la identificación de los espacios.</li>
                            <li>El espacio de la despoblación y/o estancamiento.</li>
                            <li>El espacio intensamente ocupado.</li>
                        </ul>
                        <div class="my-7 ml-3 pb-5">
                            <x-download-link 
                                href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <!-- ¿Qué busca la Estrategia Canaria de Reto demográfico y Cohesión Territorial? -->
            <div class="font-light text-[16px] pb-1">
                <button 
                    class="w-full flex items-center pl-2 text-left toggle-btn gap-x-3"
                    onmouseover="this.querySelector('svg').style.opacity='0.6'"
                    onmouseout="this.querySelector('svg').style.opacity='1'">
                    <x-orange-square-icon/>
                      ¿Qué busca la <b>Estrategia Canaria de Reto demográfico y Cohesión Territorial?</b>
                </button>
                <div class="content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-5 ml-14 mb-4">
                    <div class="overflow-hidden">
                        <p class="pt-5">
                            La Estrategia Canaria de Reto Demográfico y Cohesión Territorial (ECan RETOyCOHESIÓN) requiere un 
                            enfoque adaptado a la realidad diversa y singular del archipiélago. La naturaleza fragmentada del
                            territorio de Canarias, compuesto por ocho islas, cada una con particularidades socioeconómicas, 
                            ambientales y demográficas, exige un análisis diferenciado que permita atender los desafíos 
                            específicos de cada isla, sin perder de vista la cohesión y el equilibrio territorial en su conjunto.
                            Con todo ello en mente, los objetivos con los que pretende cumplir la ECan RETOyCOHESIÓN en los territorios
                            en despoblación son los siguientes:
                        </p>
                        <br>
                        <ul class="list-disc list-inside ml-14">
                            <li>Frenar la pérdida de población e incentivar la atracción de nuevas personas residentes, especialmente jóvenes.</li>
                            <li>Desarrollar economías locales sostenibles mediante la diversificación económica, apoyando sectores como la agricultura ecológica, el turismo rural y la industria, con el fin de generar empleo y riqueza.</li>
                            <li>Mejorar la calidad de vida y los servicios, asegurando el acceso equitativo a servicios básicos como educación, sanidad, transporte y telecomunicaciones.</li>
                            <li>Preservar y valorizar el patrimonio cultural y natural como recurso para el desarrollo económico y turístico.</li>
                            <li>Conectar los territorios rurales con las zonas urbanas, facilitando la movilidad y las comunicaciones.</li>
                        </ul>
                        <br>
                        <p>En cuanto a los territorios intensamente ocupados, la estrategia se enfoca en:</p>
                        <br>
                        <ul class="list-disc list-inside ml-14">
                            <li>Promover un desarrollo territorial más equilibrado.</li>
                            <li>Mejorar la calidad de vida en las ciudades.</li>
                            <li>Reducir la congestión y mejorar la movilidad sostenible.</li>
                            <li>Fomentar el espacio público y verde.</li>
                            <li>Garantizar la cobertura y capacidad de servicios e infraestructuras.</li>
                            <li>Gestionar la demanda de vivienda, implementando políticas que aseguren el acceso a una vivienda adecuada y asequible.</li>
                            <li>Promover la sostenibilidad ambiental mediante el uso de energías renovables y la mejora en la gestión de residuos.</li>
                            <li>Fortalecer la cohesión social, luchando contra la desigualdad, promoviendo la inclusión social y la participación ciudadana.</li>
                        </ul>
                        <p class="pb-5">
                            Para afrontar este doble enfoque es preciso que la Estrategia tenga en cuenta las particularidades
                            de cada territorio, pero también se precisan soluciones comunes que permitan <b>alcanzar una mayor 
                            cohesión territorial</b> con el fin de mejorar la calidad de vida de la ciudadanía. Para lograrlo, 
                            el fortalecimiento de la <b>gobernanza multinivel</b>  debe erigirse como piedra angular de la Estrategia, 
                            promoviendo la colaboración entre los diferentes niveles de gobierno y la participación de los agentes 
                            locales en la toma de decisiones.	
                        </p>
                        <div class="flex flex-col items-center justify-center gap-y-4 text-center">
                            <img
                                src="{{ asset('images/Dimensiones-de-la-Estrategia-Canaria-de-Reto-demografico-y-cohesion-Territorial-300x135.png') }}" 
                                alt="Estrategia Canaria de Reto Demográfico y Cohesión Territorial"
                                class="object-contain">
                            <p class="italic font-semibold text-[14px]">Dimensiones de la Estrategia Canaria de Reto Demográfico y Cohesión Territorial.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ¿Cuáles son los ámbitos temáticos? -->
            <div class="font-light text-[16px] pb-1">
                <button 
                    class="w-full flex items-center pl-2 text-left toggle-btn gap-x-3"
                    onmouseover="this.querySelector('svg').style.opacity='0.6'"
                    onmouseout="this.querySelector('svg').style.opacity='1'">
                    <x-orange-square-icon/>
                       ¿Cuáles son los <b>ámbitos temáticos?</b>
                </button>
                <div class="content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-5 ml-14 mb-4">
                    <div class="overflow-hidden">
                        <p class="pt-5">
                            <u>Ámbitos Temáticos</u>La Estrategia, que aborda de manera integral los desafíos 
                            demográficos de Canarias mediante una estructura jerárquica y multidimensional, se basa en 
                            cuatro ámbitos temáticos clave, que representan las principales áreas de intervención para 
                            alcanzar los retos demográficos: Patrimonio Natural: Territorio, Paisaje y Biodiversidad (TPB)
                        </p>
                        <ul class="list-disc list-inside ml-14">
                            <li>Se centra en la conservación y gestión sostenible de los recursos naturales.</li>
                            <li>Busca equilibrar la preservación del paisaje y la biodiversidad con el desarrollo socioeconómico.</li>
                        </ul>
                        <br>
                        <p>Patrimonio Cultural (PC)</p>
                        <ul class="list-disc list-inside ml-14">
                            <li>Pone en valor el legado cultural de Canarias como motor de desarrollo.</li>
                            <li>Promueve la protección y revitalización del patrimonio para fortalecer la identidad local y fomentar el turismo cultural.</li>
                        </ul>
                        <br>
                        <p>Cohesión del Modelo Territorial (CMT)</p>
                        <ul class="list-disc list-inside ml-14">
                            <li>Apuesta por una planificación territorial equilibrada que reduzca las desigualdades entre municipios.</li>
                            <li>Busca mejorar la conectividad, evitar la fragmentación del territorio y optimizar el uso del suelo.</li>
                        </ul>
                        <br>
                        <p>Gobernanza y Cohesión Económica y Social (GCES)</p>
                        <ul class="list-disc list-inside ml-14">
                            <li>Fortalece la cooperación institucional y la participación ciudadana.</li>
                            <li>Fomenta políticas para impulsar la economía local, mejorar la calidad de vida y promover la equidad social.</li>
                        </ul>
                        <p class="pb-5">
                            <u>Dimensiones Transversales</u> Los ámbitos temáticos están interrelacionados por dimensiones transversales — 
                            ambiental, territorial, económica y social — que garantizan un enfoque integral y sostenible. 
                            Estas dimensiones permiten articular acciones que equilibren la conservación de los recursos, 
                            el desarrollo económico y la mejora del bienestar social en Canarias.
                        </p>
                        <div class="flex flex-col items-center justify-center gap-y-4 text-center">
                            <img
                                src="{{ asset('images/Ambitos-Tematicos-300x266.png') }}" 
                                alt="Ambitos Temáticos"
                                class="object-contain">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gobernanza y tranparencia -->
            <div class="font-light text-[16px] pb-1">
                <button 
                    class="w-full flex items-center pl-2 text-left toggle-btn gap-x-3"
                    onmouseover="this.querySelector('svg').style.opacity='0.6'"
                    onmouseout="this.querySelector('svg').style.opacity='1'">
                    <x-orange-square-icon/>
                       <b>Gobernanza y tranparencia</b>
                </button>
                <div class="content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-5 ml-14 mb-4">
                    <div class="overflow-hidden">
                        <!-- Participación de las agencias de empleo y desarrollo local -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Participación de las agencias de empleo y desarrollo local
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- La Conferencia de Presidentes y los grupos de trabajo -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                La Conferencia de Presidentes y los grupos de trabajo
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2 py-3">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                    <div class="pt-4">
                                        <x-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Resultado de la consulta pública -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Resultado de la consulta pública
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Constitución del grupo de trabajo de seguimiento -->
                        <div class="my-2">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Constitución del grupo de trabajo de seguimiento
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden mx-10">
                                    <p class="pt-3">El Gobierno ha considerado oportuno convocar y constituir un grupo de trabajo de seguimiento
                                    con el objetivo de <b>abordar la respuesta y la toma en consideración</b> de las <a>aportaciones ciudadanas</a> 
                                    recibidas en el proceso de <a>consulta pública</a> del documento de <a>51 Medidas para la Canarias del Futuro.</a>
                                    Con la constitución de este grupo, se facilita una línea de diálogo con todos los agentes 
                                    implicados que permita definir la <a>Estrategia Canaria de Reto Demográfico y Cohesión Territorial</a> y su
                                    <a>Plan de Acción,</a> en el cual se desarrollen las 51 medidas estratégicas además de aquellas que, en su caso,
                                    se incorporen del proceso ciudadano.</p>

                                    <p class="pt-3">En este grupo estarán representadas las consejerías responsables de las cinco mesas de trabajo, representantes 
                                    de la FECAM, la FECAI, las universidades públicas canarias, el comité de expertos y expertas de la Agenda 2030, 
                                    los sindicatos y las patronales (como miembros del consejo asesor del presidente). La metodología de trabajo de 
                                    este grupo, en esta primera fase, para atender a las demandas ciudadanas y para concretar el Plan de Acción, se 
                                    realizará a través de reuniones de trabajo periódicas y entrevistas con los agentes que intervienen en el grupo 
                                    de seguimiento, cuyos resultados serán tratados para su incorporación en la Estrategia a través de la Secretaría 
                                    Técnica.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Estrategia Canaria de Reto Demográfico y Cohesión Territorial -->
            <div class="font-light text-[16px] pb-1">
                <button 
                    class="w-full flex items-center pl-2 text-left toggle-btn gap-x-3"
                    onmouseover="this.querySelector('svg').style.opacity='0.6'"
                    onmouseout="this.querySelector('svg').style.opacity='1'">
                    <x-orange-square-icon/>
                       <b>Estrategia Canaria de Reto Demográfico y Cohesión Territorial</b>
                </button>
                <div class="content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-5 ml-14 mb-4">
                    <div class="overflow-hidden">
                        <!--  Marco estratégico y de referencia  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Marco estratégico y de referencia 
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Metodología y proceso de elaboración  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Metodología y proceso de elaboración 
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2 py-3">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Estructura de la estrategia -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Estructura de la estrategia
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <p class="pb-5 pl-8 pt-5">
                                        La Ecan RETOyCOHESIÓN se organiza en una estructura integral y jerárquica compuesta por varios 
                                        niveles que facilitan un tratamiento global de los desafíos y oportunidades vinculados al reto 
                                        demográfico en Canarias. Esta estructura proporciona un marco coherente y escalonado para definir 
                                        los componentes clave, las prioridades y las acciones que orientan el desarrollo de la estrategia.	
                                    </p>
                                    <div class="flex flex-col items-center justify-center gap-y-4 text-center">
                                        <img
                                            src="{{ asset('images/Sin-titulo-2-1-300x115.png') }}" 
                                            alt="Estrategia Canaria de Reto Demográfico y Cohesión Territorial"
                                            class="object-contain">
                                        <p class="italic font-semibold text-[13px]">Estructura de la Estrategia Canaria de Reto demográfico y Cohesión Territorial</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Diagnóstico situacional y evaluación de las capacidades y retos -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Diagnóstico situacional y evaluación de las capacidades y retos
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ejes estratégicos y objetivos específicos -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Ejes estratégicos y objetivos específicos
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Alineación de la estrategia con la agenda urbana española y la estrategia nacional frente al reto demográfico -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Alineación de la estrategia con la agenda urbana española y la estrategia nacional frente al reto demográfico
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <!-- Espacio de la despoblación y/o estancamiento -->
                                    <div class="my-4 pl-6">
                                        <button 
                                            class="w-full flex items-center text-left gap-x-3 sub-toggle"
                                            onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                            onmouseout="this.querySelector('svg').style.opacity='1'">
                                            <x-orange-square-icon/>
                                            Espacio de la despoblación y/o estancamiento
                                        </button>

                                        <div class="sub-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out pl-6 mt-2">
                                            <div class="overflow-hidden">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-1 text-center pt-5">
                                                    <div class="flex flex-col items-center gap-2">
                                                        <img
                                                            src="{{ asset('images/schemas/Esquema_relacion_DP_AU-150x150.png') }}"
                                                            alt="Esquema relación DP_AU"
                                                            class="object-contain max-w-full">
                                                        <p class="italic text-[12px]">
                                                            Esquema relación DP_AU
                                                        </p>
                                                    </div>

                                                    <div class="flex flex-col items-center gap-2">
                                                        <img
                                                            src="{{ asset('images/schemas/Esquema_relacion_DP_ENRD-150x150.png') }}"
                                                            alt="Esquema relación DP_ENRD"
                                                            class="object-contain max-w-full">
                                                        <p class="italic text-[12px]">
                                                            Esquema relación DP_ENRD
                                                        </p>
                                                    </div>

                                                    <div class="flex flex-col items-center gap-2">
                                                        <img
                                                            src="{{ asset('images/schemas/Esquema_relacion_DP_ODS-150x150.png') }}"
                                                            alt="Esquema relación DP_ODS"
                                                            class="object-contain max-w-full">
                                                        <p class="italic text-[12px]">
                                                            Esquema relación DP_ODS
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Espacio tensionado (Intensamente ocupado) -->
                                    <div class="mt-4 pl-6">
                                        <button 
                                            class="w-full flex items-center text-left gap-x-3 sub-toggle"
                                            onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                            onmouseout="this.querySelector('svg').style.opacity='1'">
                                            <x-orange-square-icon/>
                                            Espacio tensionado (Intensamente ocupado)
                                        </button>

                                        <div class="sub-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out pl-6 mt-2">
                                            <div class="overflow-hidden">
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-1 text-center pt-5">
                                                    <div class="flex flex-col items-center gap-2">
                                                        <img
                                                            src="{{ asset('images/schemas/Esquema_relacion_IO_AU-150x150.png') }}"
                                                            alt="Esquema relación DP_AU"
                                                            class="object-contain max-w-full">
                                                        <p class="italic text-[12px]">
                                                            Esquema relación IO_AU
                                                        </p>
                                                    </div>

                                                    <div class="flex flex-col items-center gap-2">
                                                        <img
                                                            src="{{ asset('images/schemas/Esquema_relacion_IO_ODS-150x150.png') }}"
                                                            alt="Esquema relación DP_ENRD"
                                                            class="object-contain max-w-full">
                                                        <p class="italic text-[12px]">
                                                            Esquema relación IO_ODS
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Estrategía Canaria de Reto Demográfico y Cohesión Territorial -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Estrategía Canaria de Reto Demográfico y Cohesión Territorial
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Resumen de la Estrategia -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Resumen de la Estrategia
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Resumen Ejecutivo -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Resumen Ejecutivo
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Estrategia Canaria de Reto Demográfico y Cohesión Territorial -->
            <div class="font-light text-[16px] pb-1">
                <button 
                    class="w-full flex items-center pl-2 text-left toggle-btn gap-x-3"
                    onmouseover="this.querySelector('svg').style.opacity='0.6'"
                    onmouseout="this.querySelector('svg').style.opacity='1'">
                    <x-orange-square-icon/>
                       <b>Plan de Acción</b>
                </button>
                <div class="content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-5 ml-14 mb-4">
                    <div class="overflow-hidden">
                        <!--  Plan de Acción Ejecutivo. Fichas de las 43 medidas  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Plan de Acción Ejecutivo. Fichas de las 43 medidas
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Plan de Acción Ejecutivo. Alineación de las medidas con la Agenda Canaria 2030 y los ODS  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Plan de Acción Ejecutivo. Alineación de las medidas con la Agenda Canaria 2030 y los ODS
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Plan de Acción Operativo - en elaboración  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Plan de Acción Operativo - en elaboración
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Anexos -->
            <div class="font-light text-[16px] pb-1">
                <button 
                    class="w-full flex items-center pl-2 text-left toggle-btn gap-x-3"
                    onmouseover="this.querySelector('svg').style.opacity='0.6'"
                    onmouseout="this.querySelector('svg').style.opacity='1'">
                    <x-orange-square-icon/>
                       <b>Anexos</b>
                </button>
                <div class="content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-5 ml-14 mb-4">
                    <div class="overflow-hidden">
                        <!--  Anexo I. Parte 1 Fase preliminar de participación con los municipios reto demográfico  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Anexo I. Parte 1 Fase preliminar de participación con los municipios reto demográfico
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Anexo II. Documento sometido a consulta pública 51 medidas  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Anexo II. Documento sometido a consulta pública 51 medidas
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Anexo III. Informe resumen del periodo de consulta pública  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Anexo III. Informe resumen del periodo de consulta pública
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Anexo IV. Temáticas de las aportaciones proceso de consulta pública  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Anexo IV. Temáticas de las aportaciones proceso de consulta pública
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Anexo V. Evaluación enfoque reto demográfico Planes Insulares de Ordenación  -->
                        <div class="my-5">
                            <button 
                                class="w-full flex items-center pl-2 text-left gap-x-3 internal-toggle"
                                onmouseover="this.querySelector('svg').style.opacity='0.6'"
                                onmouseout="this.querySelector('svg').style.opacity='1'">
                                <x-orange-square-icon/>
                                Anexo V. Evaluación enfoque reto demográfico Planes Insulares de Ordenación
                            </button>
                            <div class="internal-content grid grid-rows-[0fr] transition-all duration-500 ease-in-out px-2 mb-5">
                                <div class="overflow-hidden">
                                    <div class="pt-7 px-2">
                                        <x-download-link 
                                            href="https://retodemograficogobcan.org/wp-content/uploads/2025/05/Espacios-de-la-demografia-en-Canarias.pdf"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SCRIPT -->
    <script>
    document.querySelectorAll('.toggle-btn').forEach(btn => {

        btn.addEventListener('click', () => {

            const content = btn.nextElementSibling
            const icon = btn.querySelector('.icon')

            // CERRAR LOS OTROS PADRES
            document.querySelectorAll('.content').forEach(el => {
            if (el !== content) {
                el.classList.remove("grid-rows-[1fr]")
            }
            })

            document.querySelectorAll('.icon').forEach(i => {
            if (i !== icon) {
                i.textContent = '+'
            }
            })

            // TOGGLE PADRE (GRID)
            const isOpen = content.classList.contains("grid-rows-[1fr]")

            if (isOpen) {
            content.classList.remove("grid-rows-[1fr]")
            icon.textContent = '+'
            } else {
            content.classList.add("grid-rows-[1fr]")
            icon.textContent = '−'
            }
        })
    });

    // ================= HIJOS =================

    document.querySelectorAll(".internal-toggle").forEach(btn => {

        btn.addEventListener("click", (e) => {

            e.stopPropagation();

            const content = btn.nextElementSibling;
            const parent = btn.closest(".content");

            // cerrar hermanos
            parent.querySelectorAll(".internal-content").forEach(el => {
                if (el !== content) {
                    el.classList.remove("grid-rows-[1fr]");
                }
            });

            // toggle grid
            const isOpen = content.classList.contains("grid-rows-[1fr]");

            if (isOpen) {
                content.classList.remove("grid-rows-[1fr]");
            } else {
                content.classList.add("grid-rows-[1fr]");
            }

        });

    });

    // ===== SUB NIVEL AGENDA URBANA =====

    document.querySelectorAll(".sub-toggle").forEach(btn => {

        btn.addEventListener("click", (e) => {

            e.stopPropagation();

            const content = btn.nextElementSibling;

            // bloque contenedor del grupo
            const scope = btn.closest(".internal-content");

            // cerrar otros subniveles
            scope.querySelectorAll(".sub-content").forEach(el => {
                if (el !== content) {
                    el.classList.remove("grid-rows-[1fr]");
                }
            });

            // toggle actual
            const isOpen = content.classList.contains("grid-rows-[1fr]");

            if (isOpen) {

                content.classList.remove("grid-rows-[1fr]");

            } else {

                content.classList.add("grid-rows-[1fr]");

            }
        });
    });

</script>

@endsection
