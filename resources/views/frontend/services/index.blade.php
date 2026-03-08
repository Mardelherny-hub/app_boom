<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- ============================================ --}}
    {{-- HEADER - Similar al Bloque 2 del Home --}}
    {{-- ============================================ --}}
    <section class="bg-boom-orange py-20 px-4 pt-32">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <p class="text-lg md:text-xl leading-relaxed mb-6">
                        En Boom contamos con un equipo especializado en cada área para poder ofrecer todos los servicios relacionados a publicidad, redes sociales, diseño gráfico y páginas web.
                    </p>
                    <p class="text-lg md:text-xl leading-relaxed">
                        Nuestros servicios abarcan desde el asesoramiento y la estrategia, hasta la idea creativa, la producción y el control.
                    </p>
                </div>
                <div>
                    <div class="bg-white/20 aspect-[4/3] rounded-lg flex items-center justify-center text-white/60">
                        <img src="{{ asset('images/home/servicios.webp') }}" 
         alt="Servicios Boom Studio" 
         class="w-full aspect-[4/3] object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- SERVICIO 1 - REDES SOCIALES (Imagen derecha) --}}
    {{-- ============================================ --}}
    <section class="bg-[#FBFAFA] py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Texto IZQUIERDA --}}
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-boom-gray mb-4">Redes Sociales</h2>
                    <p class="text-lg text-boom-orange font-medium mb-4">Hacemos que tu voz llegue donde importa.</p>                   
                    <p class="font-medium text-boom-gray mb-3">Lo que ofrecemos:</p>
                    <ul class="text-boom-gray space-y-2 mb-8">
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Planificación mensual de contenidos
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Creación de piezas gráficas, videos y creatividades
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Edición de fotos / videos
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Gestión de comunidad, posteos, stories, reels, etc.
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Estrategia de crecimiento y optimización de engagement
                        </li>
                    </ul>
                    
                    <p class="text-boom-gray font-medium mb-4">¿Querés que manejemos tus redes y hagamos crecer tu marca?</p>
                    <a href="{{ route('contact') }}" 
                       class="inline-block bg-boom-orange text-white px-8 py-3 rounded-full font-bold uppercase text-sm tracking-wider hover:bg-opacity-90 transition">
                        Escribinos
                    </a>
                </div>
                
                {{-- Imagen DERECHA --}}
                <div>
                    <div class="bg-gray-200 aspect-[4/3] rounded-lg flex items-center justify-center text-gray-400">
                        <img src="{{ asset('images/services/redes-sociales-new.webp') }}" 
                            alt="Redes Sociales" 
                            class="w-full aspect-[4/3] object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- SERVICIO 2 - PUBLICIDAD (Imagen izquierda) --}}
    {{-- ============================================ --}}
    <section class="bg-white py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Imagen IZQUIERDA --}}
                <div class="order-2 md:order-1">
                    <img src="{{ asset('images/services/publicidad-new.webp') }}" 
                        alt="Publicidad" 
                        class="w-full aspect-[4/3] object-cover rounded-lg">
                </div>
                
                {{-- Texto DERECHA --}}
                <div class="order-1 md:order-2">
                    <h2 class="text-3xl md:text-4xl font-bold text-boom-gray mb-4">Publicidad</h2>
                    <p class="text-lg text-boom-orange font-medium mb-4">Hacemos que te vean — y que te elijan.</p>
                    <p class="font-medium text-boom-gray mb-3">Qué incluye:</p>
                    <ul class="text-boom-gray space-y-2 mb-8">
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Investigación de mercado y público objetivo
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Estrategia publicitaria y planificación de campañas
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Creación de contenido específico para anuncios (gráficos, videos, copys)
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Configuración de campañas en Meta (Facebook, Instagram, WhatsApp)
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Monitoreo, análisis y optimización constante de resultados
                        </li>
                    </ul>
                    
                    <p class="text-boom-gray font-medium mb-4">¿Listo para hacer campañas que realmente funcionen?</p>
                    <a href="{{ route('contact') }}" 
                       class="inline-block bg-boom-orange text-white px-8 py-3 rounded-full font-bold uppercase text-sm tracking-wider hover:bg-opacity-90 transition">
                        Hablanos
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- SERVICIO 3 - DISEÑO GRÁFICO (Imagen derecha) --}}
    {{-- ============================================ --}}
    <section class="bg-[#FBFAFA] py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Texto IZQUIERDA --}}
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-boom-gray mb-4">Diseño Gráfico</h2>
                    <p class="text-lg text-boom-orange font-medium mb-4">Diseñamos tu imagen para que tu marca hable por vos.</p>
                    <p class="font-medium text-boom-gray mb-3">Incluye:</p>
                    <ul class="text-boom-gray space-y-2 mb-8">
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Branding e identidad visual
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Papelería corporativa (tarjetas, sobres, hojas, etc.)
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Cartelería y materiales impresos
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Packaging y etiquetas
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Catálogos y folletos
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Piezas gráficas a medida
                        </li>
                    </ul>
                    
                    <p class="text-boom-gray font-medium mb-4">¿Querés mejorar la imagen de tu marca o desarrollar nuevas piezas gráficas?</p>
                    <a href="{{ route('contact') }}" 
                       class="inline-block bg-boom-orange text-white px-8 py-3 rounded-full font-bold uppercase text-sm tracking-wider hover:bg-opacity-90 transition">
                        Hablemos
                    </a>
                </div>
                
                {{-- Imagen DERECHA --}}
                <div>
                    <div class="bg-gray-200 aspect-[4/3] rounded-lg flex items-center justify-center text-gray-400">
                        <div>
                            <img src="{{ asset('images/services/diseno-grafico-new.webp') }}" 
                                alt="Diseño Gráfico" 
                                class="w-full aspect-[4/3] object-cover rounded-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- SERVICIO 4 - WEB (Imagen izquierda) --}}
    {{-- ============================================ --}}
    <section class="bg-white py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Imagen IZQUIERDA --}}
                <div class="order-2 md:order-1">
                    <div class="bg-gray-200 aspect-[4/3] rounded-lg flex items-center justify-center text-gray-400">
                        <div class="order-2 md:order-1">
                            <img src="{{ asset('images/services/web-new.webp') }}" 
                                alt="Desarrollo Web" 
                                class="w-full aspect-[4/3] object-cover rounded-lg">
                        </div>
                    </div>
                </div>
                
                {{-- Texto DERECHA --}}
                <div class="order-1 md:order-2">
                    <h2 class="text-3xl md:text-4xl font-bold text-boom-gray mb-4">Web</h2>
                    <p class="text-lg text-boom-orange font-medium mb-4">Llevamos tu negocio al mundo digital con profesionalismo.</p>
                    <p class="font-medium text-boom-gray mb-3">Servicios disponibles:</p>
                    <ul class="text-boom-gray space-y-2 mb-8">
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Desarrollo de sitios web corporativos
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Tiendas online completas (ecommerce)
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Páginas institucionales
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Diseño responsivo y adaptable a móviles
                        </li>
                        <li class="flex items-start">
                            <span class="text-boom-orange mr-2">•</span>
                            Soporte y mantenimiento
                        </li>
                    </ul>
                    
                    <p class="text-boom-gray font-medium mb-4">¿Necesitás una web profesional o una tienda online?</p>
                    <a href="{{ route('contact') }}" 
                       class="inline-block bg-boom-orange text-white px-8 py-3 rounded-full font-bold uppercase text-sm tracking-wider hover:bg-opacity-90 transition">
                        Te asesoramos
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>