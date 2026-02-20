@extends('layouts.app')

@section('content')

<!-- Selector de ámbito -->
<section class="pt-22">

    <!-- Imagen -->
    <div class="bg-white items-center justify-center h-110 ">
        <img 
            src="/images/ac/Actualidad.png" 
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
        <x-news-card 
        title='Consulta pública del documento "51 medidas para la Canarias del Futuro".'
        description="Accede al documento que recoge las 51 medidas elaboradas y consensuadas por más de 100 expertos de distintos ámbitos, tanto públicos como privados. Estas propuestas están diseñadas para impulsar el desarrollo sostenible en Canarias."
        image="{{ asset('images/ac/Portada-landing-page-V-web-1024x548.jpg') }}"
        more="Ir—"
        link="#"
        />
        <x-news-card
        title="Grupo de seguimiento de la Estrategia Canaria de Reto Demográfico y Cohesión Territorial."
        description="Órgano multidisciplinar encargado de llevar a cabo el desarrollo e implementación de las 51 propuestas aprobadas en la II Conferencia de Presidentes, garantizando un enfoque integral."
        image="{{ asset('images/ac/Noticia_2-1024x527.png') }}"
        more="Ir—"
        link="https://www3.gobiernodecanarias.org/noticias/el-gobierno-suma-a-universidades-expertos-empresarios-y-sindicatos-al-foro-de-dialogo-sobre-el-reto-demografico/"
        />
        <x-news-card
        title="Oficina virtual de apoyo a los municipios reto demográfico de la despoblación."
        description="Iniciativa de la Consejería de Política Territorial, Cohesión Territorial y Aguas, diseñada para asistir a los 47 municipios afectados por este desafío."
        image="{{ asset('images/ac/application-logo-e1744448296100.png') }}"
        more="Ir—"
        link="https://ovrd.org/"
        />

        <x-news-card 
        title='Política Territorial pone en marcha la oficina virtual de apoyo administrativo a municipios de reto demográfico'
        description="La Consejería de Política Territorial, Cohesión Territorial y Aguas del Gobierno de Canarias ha presentado esta mañana la Oficina Virtual del Reto Demográfico, una nueva medida de apoyo a los 47 municipios de menos de 10.000 habitantes que existen en Canarias"
        image="{{ asset('images/ac/Oficina-virtual-de-apoyo-a-municipios-reto-demografico-e1746689532401.jpeg') }}"
        more="Ir—"
        link="https://www3.gobiernodecanarias.org/noticias/politica-territorial-pone-en-marcha-la-oficina-virtual-de-apoyo-administrativo-a-municipios-de-reto-demografico/"
        />
        <x-news-card
        title="Dos de cada tres municipios canarios de menos de 10.000 habitantes piden ayuda al ‘funcionario virtual’ del Gobierno"
        description="Es un hecho que los ayuntamientos de los 47 municipios de menos de 10.000 habitantes carecen de personal suficiente para hacer expedientes de contratación, ordenanzas fiscales, pliegos o presupuestos, presentar subvenciones o agilizar el otorgamiento de licencias y, además, sacar adelante los planeamientos territoriales."
        image="{{ asset('images/ac/d0c0c1f8-f8e9-4072-9ce3-97d9d48d05ba_16-9-discover-aspect-ratio_default_0.webp') }}"
        more="Ir—"
        link="https://www.laprovincia.es/canarias/2025/09/08/tres-municipios-canarios-10-000-121369333.html"
        />
        <x-news-card
        title="La III Conferencia de Presidentes de Canarias avanza en el nuevo marco de cooperación del sistema de dependencia"
        description='RETO DEMOGRÁFICO Y COHESIÓN TERRITORIAL DE CANARIAS En otro orden de cosas, la III Conferencia de Presidentes dio un paso más para la materialización de la Estrategia Canaria de Reto Demográfico y Cohesión Territorial de Canarias. Una Estrategia que según destacó el presidente de Canarias, Fernando Clavijo, "nace de las aportaciones de toda la sociedad canaria: administraciones públicas, instituciones académicas, agentes sociales y económicos y de la ciudadanía".'
        image="{{ asset('images/ac/7422433.webp') }}"
        more="Ir—"
        link="https://www.pressdigital.es/articulo/politica/2025-06-23/5340937-iii-conferencia-presidentes-canarias-avanza-nuevo-marco-cooperacion-sistema-dependencia"
        />

        <x-news-card 
        title='Canarias celebra el I Congreso sobre Reto Demográfico para anticipar soluciones a los desafíos poblacionales'
        description="El Gobierno de Canarias ha presentado hoy en rueda de prensa el I Congreso sobre Reto Demográfico de Canarias, que se celebrará en Gáldar los días 2 y 3 de octubre. Se trata de un encuentro pionero que reunirá a expertos, instituciones y agentes sociales para analizar y debatir las claves del futuro demográfico del Archipiélago."
        image="{{ asset('images/ac/WhatsApp-Image-2025-09-19-at-19.14.20.jpeg') }}"
        more="Ir—"
        link="https://www3.gobiernodecanarias.org/noticias/canarias-celebra-el-i-congreso-sobre-reto-demografico-para-anticipar-soluciones-a-los-desafios-poblacionales/"
        />
        <x-news-card
        title="I Congreso de Reto Demográfico de Canarias"
        description="Los días 2 y 3 de octubre, más de 150 personas expertas, instituciones y agentes sociales se reunirán en el Centro Cultural Guaires para debatir sobre el futuro poblacional del Archipiélago. El Gobierno de Canarias presentó en rueda de prensa el I Congreso sobre Reto Demográfico de Canarias, un encuentro pionero que se celebrará en Gáldar y que tiene como finalidad analizar y discutir las claves del futuro demográfico del Archipiélago desde una perspectiva multidisciplinar e inclusiva."
        image="{{ asset('images/ac/Prensa-Horizontal-Congreso-scaled.png') }}"
        more="Ir—"
        link="https://www.ull.es/portal/agenda/evento/i-congreso-de-reto-demografico-de-canarias/"
        />
        <x-news-card
        title="El Gobierno da el visto bueno a la Estrategia Canaria de Reto Demográfico y Cohesión Territorial"
        description="El Consejo de Gobierno de Canarias ha aprobado hoy la Estrategia de Reto Demográfico y Cohesión Territorial de Canarias, junto a su correspondiente Plan de Acción Ejecutivo (PAE), una herramienta que marcará la planificación pública de los próximos años en materia de equilibrio territorial y sostenibilidad social."
        image="{{ asset('images/ac/imagen.png') }}"
        more="Ir—"
        link="https://www3.gobiernodecanarias.org/noticias/el-gobierno-da-el-visto-bueno-a-la-estrategia-canaria-de-reto-demografico-y-cohesion-territorial/"
        />
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
        <x-news-card 
        title='Política Territorial aborda el papel de la mujer rural y la mujer migrante en el marco de las II Jornadas de Género'
        description="Las II Jornadas de Género reunieron a instituciones, especialistas y ciudadanía para integrar la perspectiva de género en la planificación territorial. Este año se abordó el papel de las mujeres rurales y la realidad de las mujeres migrantes en Canarias. Los encuentros incluyeron testimonios, ponencias y debates que visibilizaron aportaciones y desafíos. Ambas sesiones promovieron el intercambio de conocimientos y la reflexión interdisciplinar."
        image="{{ asset('images/ac/94_JMM-1024x683.jpg') }}"
        more=""
        link="#"
        />
        <x-news-card
        title="Canarias celebra el I Congreso sobre Reto Demográfico para anticipar soluciones a los desafíos poblacionales"
        description="Los días 2 y 3 de octubre, más de 150 expertos, instituciones y agentes sociales debatirán en el Centro Cultural Guaires sobre el futuro poblacional del Archipiélago El Gobierno de Canarias ha presentado hoy en rueda de prensa el I Congreso sobre Reto Demográfico de Canarias, que se celebrará en Gáldar los días 2 y 3 de octubre. Se trata de un encuentro pionero que reunirá a expertos, instituciones y agentes sociales para analizar y debatir las claves del futuro demográfico del Archipiélago."
        image="{{ asset('images/ac/Prensa-Horizontal-Congreso-scaled.png') }}"
        more=""
        link="#"
        />
        <x-news-card
        title="III Encuentro Canarias Sostenible"
        description="Accede al documento de 51 medidas que han consensuado más de 100 expertos de los ámbitos públicos y privados para impulsar el desarrollo sostenible en Canaria. La tercera edición de “Encuentro Canarias Sostenible” se desarrolla bajo el lema Islas Responsables: La Nueva ruralidad y está organizada por la Presidencia del Gobierno de Canarias para abordar los desafíos del Reto Demográfico y la Cohesión Territorial."
        image="{{ asset('images/ac/Experiencia_1-1024x528.png') }}"
        more="Ir—"
        link="{{ asset('storage/files/PROGRAMA-III-ENCUENTRO-CANARIAS-SOSTENIBLE.pdf') }}"
        />

        <x-news-card 
        title='La Universidad de La Laguna indaga en las claves del reto demográfico y la cohesión territorial de Canarias'
        description="Los equipos técnicos de la Agencia Universitaria de Innovación de la ULL celebraron un encuentro para analizar el reto demográfico del archipiélago. La iniciativa busca impulsar procesos de capacitación y trabajo colaborativo a través de la Fundación General de la Universidad de La Laguna."
        image="{{ asset('images/ac/IMG_8849_edited-1024x683.jpg') }}"
        more="Ir—"
        link="https://www.ull.es/portal/noticias/2025/la-universidad-de-la-laguna-indaga-en-las-claves-del-reto-demografico-y-la-cohesion-territorial-de-canarias/"
        />
        <x-news-card
        title="Jornadas paticipativas para la actualización de la Ley 4/2017 del Suelo y los Espacios Naturales Protegidos de Canarias"
        description="Se plantea un proceso participativo para valorar su actualización con los equipos técnicos de las administraciones involucrados en su aplicación. Todo ello a través de la participación y colaboración de los distintos agentes."
        image="{{ asset('images/ac/Experiencia2-1024x528.png') }}"
        more=""
        link="#"
        />
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
        <x-links-card 
        title='Ineco RuralTIC'
        description="Ineco RuralTIC es un programa pionero de impulso a la digitalización del mundo rural desarrollado por Ineco, referente en ingeniería y consultoría para abordar transformaciones de complejidad e impacto. Proyectos orientados a vertebrar y cohesionar el territorio, y a crear unos servicios públicos más ágiles, eficientes y accesibles para la ciudadanía."
        image="{{ asset('images/ac/Ineco-Rural-Tic-1024x1024.png') }}"
        more="Ir—"
        link="https://gis.ineco.com/inecoapps/RuralTIC/?page=INICIO"
        />
        <x-links-card
        title="Inscripción Candidaturas Municipios Ed. 4.0."
        description="Si eres un municipio de menos de 10.000 habitantes, cumples los requisitos de partida (WIFI/4G, asunción de costes de alojamiento de los/as voluntarios/as de Ineco y espacios para la realización de talleres y/o teletrabajo) y quieres incorporarte al programa, rellena este formulario."
        image="{{ asset('images/ac/Captura-1024x568.jpg') }}"
        more="Ir—"
        link="https://gis.ineco.com/inecoapps/RuralTIC/?page=INSCRIBE-A-TU-MUNICIPIO"
        />
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