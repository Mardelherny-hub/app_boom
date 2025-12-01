<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- ============================================ --}}
    {{-- HERO SLIDESHOW --}}
    {{-- ============================================ --}}
    <section class="relative min-h-screen overflow-hidden" x-data="{ activeSlide: 0 }" x-init="setInterval(() => activeSlide = (activeSlide + 1) % 4, 2500)">
        
        {{-- Slides --}}
        <div class="relative min-h-screen">
            
            {{-- Slide 1 - Naranja --}}
            <div class="absolute inset-0 transition-opacity duration-1000 flex items-center"
                :class="activeSlide === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'"
                style="background-color: #E94C23;">
                {{-- Marca de agua --}}
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none overflow-hidden">
                    <span class="text-[40vw] font-script text-white opacity-10 select-none">boom!</span>
                </div>
                {{-- Contenido --}}
                <div class="relative z-10 max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
                    <div class="text-white">
                        <p class="text-sm uppercase tracking-widest mb-2">Redes Sociales</p>
                        <h2 class="text-5xl md:text-7xl font-black uppercase leading-none mb-4">
                            CONTENIDO<br>DIGITAL
                        </h2>
                        <p class="text-lg opacity-90 mb-6">Creamos estrategias que conectan con tu audiencia</p>
                        {{-- <a href="{{ route('services.index') }}" class="inline-block bg-white text-boom-orange px-8 py-3 rounded-full font-bold uppercase text-sm hover:bg-opacity-90 transition">
                            Ver más
                        </a> --}}
                    </div>
                    <div class="hidden md:block">
                        {{-- Espacio para imagen/mockup --}}
                    </div>
                </div>
            </div>

            {{-- Slide 2 - Celeste --}}
            <div class="absolute inset-0 transition-opacity duration-1000 flex items-center"
                :class="activeSlide === 1 ? 'opacity-100 z-10' : 'opacity-0 z-0'"
                style="background-color: #79BFEA;">
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none overflow-hidden">
                    <span class="text-[40vw] font-script text-white opacity-10 select-none">boom!</span>
                </div>
                <div class="relative z-10 max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
                    <div class="text-white">
                        <p class="text-sm uppercase tracking-widest mb-2">Diseño Web</p>
                        <h2 class="text-5xl md:text-7xl font-black uppercase leading-none mb-4">
                            SITIOS QUE<br>CONVIERTEN
                        </h2>
                        <p class="text-lg opacity-90 mb-6">Desarrollo web profesional y autoadministrable</p>
                        {{-- <a href="{{ route('services.index') }}" class="inline-block bg-white text-boom-blue px-8 py-3 rounded-full font-bold uppercase text-sm hover:bg-opacity-90 transition">
                            Ver más
                        </a> --}}
                    </div>
                    <div class="hidden md:block"></div>
                </div>
            </div>

            {{-- Slide 3 - Rosa --}}
            <div class="absolute inset-0 transition-opacity duration-1000 flex items-center"
                :class="activeSlide === 2 ? 'opacity-100 z-10' : 'opacity-0 z-0'"
                style="background-color: #FFC2F5;">
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none overflow-hidden">
                    <span class="text-[40vw] font-script text-boom-gray opacity-10 select-none">boom!</span>
                </div>
                <div class="relative z-10 max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
                    <div class="text-boom-gray">
                        <p class="text-sm uppercase tracking-widest mb-2">Publicidad</p>
                        <h2 class="text-5xl md:text-7xl font-black uppercase leading-none mb-4">
                            CAMPAÑAS<br>EFECTIVAS
                        </h2>
                        <p class="text-lg opacity-90 mb-6">Estrategias publicitarias que generan resultados</p>
                        {{-- <a href="{{ route('services.index') }}" class="inline-block bg-boom-gray text-white px-8 py-3 rounded-full font-bold uppercase text-sm hover:bg-opacity-90 transition">
                            Ver más
                        </a> --}}
                    </div>
                    <div class="hidden md:block"></div>
                </div>
            </div>

            {{-- Slide 4 - Verde --}}
            <div class="absolute inset-0 transition-opacity duration-1000 flex items-center"
                :class="activeSlide === 3 ? 'opacity-100 z-10' : 'opacity-0 z-0'"
                style="background-color: #E5E863;">
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none overflow-hidden">
                    <span class="text-[40vw] font-script text-boom-gray opacity-10 select-none">boom!</span>
                </div>
                <div class="relative z-10 max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
                    <div class="text-boom-gray">
                        <p class="text-sm uppercase tracking-widest mb-2">Diseño Gráfico</p>
                        <h2 class="text-5xl md:text-7xl font-black uppercase leading-none mb-4">
                            MARCAS<br>MEMORABLES
                        </h2>
                        <p class="text-lg opacity-90 mb-6">Identidad visual que destaca y perdura</p>
                        {{-- <a href="{{ route('services.index') }}" class="inline-block bg-boom-gray text-white px-8 py-3 rounded-full font-bold uppercase text-sm hover:bg-opacity-90 transition">
                            Ver más
                        </a> --}}
                    </div>
                    <div class="hidden md:block"></div>
                </div>
            </div>
        </div>

        {{-- Indicadores --}}
        {{-- <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
            <template x-for="(slide, index) in 4" :key="index">
                <button @click="activeSlide = index" 
                        class="w-3 h-3 rounded-full transition-all"
                        :class="activeSlide === index ? 'bg-white scale-125' : 'bg-white/50'">
                </button>
            </template>
        </div> --}}

    </section>

    {{-- ============================================ --}}
    {{-- BLOQUE 1 - INTRO AGENCIA --}}
    {{-- ============================================ --}}
    <section class="bg-[#FBFAFA] py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Imagen IZQUIERDA --}}
                <div>
                    <div class="bg-gray-200 aspect-[4/3] rounded-lg flex items-center justify-center text-gray-400">
                        {{-- Placeholder hasta recibir imagen del cliente --}}
                        <span class="text-sm">Imagen pendiente</span>
                    </div>
                </div>
                
                {{-- Texto DERECHA --}}
                <div>
                    <p class="text-lg md:text-xl text-boom-gray leading-relaxed mb-6">
                        Somos una agencia creativa con visión comercial, donde el análisis, la estrategia y la comunicación se combinan con diseño, datos y contenido audiovisual.
                    </p>
                    <p class="text-lg md:text-xl text-boom-gray italic font-medium">
                        Llegamos para conectar lo comercial y lo digital.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- BLOQUE 2 - EQUIPO BOOM --}}
    {{-- ============================================ --}}
    <section class="bg-boom-orange py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Texto IZQUIERDA --}}
                <div class="text-white">
                    <p class="text-lg md:text-xl leading-relaxed mb-6">
                        En Boom contamos con un equipo especializado en cada área para poder ofrecer todos los servicios relacionados a publicidad, redes sociales, diseño gráfico y páginas web.
                    </p>
                    <p class="text-lg md:text-xl leading-relaxed">
                        Nuestros servicios abarcan desde el asesoramiento y la estrategia, hasta la idea creativa, la producción y el control.
                    </p>
                </div>
                
                {{-- Imagen DERECHA --}}
                <div>
                    <div class="bg-white/20 aspect-[4/3] rounded-lg flex items-center justify-center text-white/60">
                        {{-- Placeholder hasta recibir imagen del cliente --}}
                        <span class="text-sm">Imagen pendiente</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- BLOQUE 3 - SERVICIOS (estilo Broder, sin cajas) --}}
    {{-- ============================================ --}}
    <section class="bg-boom-orange py-16 px-4 border-t border-white/20">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12 text-white">
                
                {{-- Redes Sociales --}}
                <div>
                    <h3 class="font-bold text-lg uppercase mb-4">Redes Sociales</h3>
                    <ul class="space-y-2 text-sm opacity-90">
                        <li>Creación</li>
                        <li>Planificación</li>
                        <li>Generación de contenidos</li>
                        <li>Edición de contenidos</li>
                    </ul>
                </div>
                
                {{-- Publicidad --}}
                <div>
                    <h3 class="font-bold text-lg uppercase mb-4">Publicidad</h3>
                    <ul class="space-y-2 text-sm opacity-90">
                        <li>Investigación de mercado</li>
                        <li>Estrategia publicitaria</li>
                        <li>Creación de contenido</li>
                        <li>Configuración de plataforma publicitaria</li>
                    </ul>
                </div>
                
                {{-- Diseño Gráfico --}}
                <div>
                    <h3 class="font-bold text-lg uppercase mb-4">Diseño Gráfico</h3>
                    <ul class="space-y-2 text-sm opacity-90">
                        <li>Marca</li>
                        <li>Papelería</li>
                        <li>Cartelería</li>
                        <li>Packaging y Catálogo</li>
                    </ul>
                </div>
                
                {{-- Web --}}
                <div>
                    <h3 class="font-bold text-lg uppercase mb-4">Web</h3>
                    <ul class="space-y-2 text-sm opacity-90">
                        <li>Sitios Autoadministrables</li>
                        <li>Tiendas Online</li>
                        <li>Páginas Institucionales</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- BLOQUE 4 - PORTFOLIO --}}
    {{-- ============================================ --}}
    <section class="bg-[#FBFAFA] py-20 px-4">
        <div class="max-w-6xl mx-auto">
            
            {{-- Intro: Imagen + Texto --}}
            <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                {{-- Imagen IZQUIERDA --}}
                <div>
                    <div class="bg-gray-200 aspect-[4/3] rounded-lg flex items-center justify-center text-gray-400">
                        <span class="text-sm">Imagen pendiente</span>
                    </div>
                </div>
                
                {{-- Texto DERECHA --}}
                <div>
                    <p class="text-lg text-boom-gray leading-relaxed mb-4">
                        <strong>Estos son algunos de los proyectos que desarrollamos en los últimos años para marcas de diferentes rubros y lugares del país.</strong>
                    </p>
                    <p class="text-base text-boom-gray leading-relaxed mb-4">
                        En cada trabajo analizamos el contexto, las necesidades y los objetivos del cliente para crear soluciones estratégicas y creativas.
                    </p>
                    <p class="text-base text-boom-gray leading-relaxed">
                        Desde el diseño, las redes sociales, la web y la publicidad, buscamos ofrecer resultados reales que impulsen el crecimiento de cada marca.
                    </p>
                </div>
            </div>
            
            {{-- Filtros --}}
            <div class="flex flex-wrap gap-4 mb-12 justify-center">
                <button class="px-6 py-2 rounded-full border-2 border-boom-gray text-boom-gray font-medium hover:bg-boom-gray hover:text-white transition">
                    Redes Sociales
                </button>
                <button class="px-6 py-2 rounded-full border-2 border-boom-gray text-boom-gray font-medium hover:bg-boom-gray hover:text-white transition">
                    Diseño Gráfico
                </button>
                <button class="px-6 py-2 rounded-full border-2 border-boom-gray text-boom-gray font-medium hover:bg-boom-gray hover:text-white transition">
                    Página Web
                </button>
                <button class="px-6 py-2 rounded-full border-2 border-boom-gray text-boom-gray font-medium hover:bg-boom-gray hover:text-white transition">
                    Publicidad
                </button>
            </div>
            
            {{-- Grilla de Proyectos --}}
            @php
            $projectColors = [
                'bg-boom-orange',
                'bg-boom-blue', 
                'bg-boom-green',
                'bg-boom-pink',
                'bg-boom-gray',
                'bg-yellow-400',
            ];
            @endphp
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($projects as $index => $project)
                <a href="{{ route('portfolio.show', $project->slug) }}" 
                class="relative aspect-square rounded-lg overflow-hidden group">
                    @if($project->getFirstMediaUrl('featured_image'))
                        <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-40 transition-opacity"></div>
                    @else
                        <div class="w-full h-full {{ $projectColors[$index % 6] }}"></div>
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity"></div>
                    @endif
                    <div class="absolute bottom-4 left-4 text-white">
                        @if($project->category)
                        <p class="text-xs uppercase tracking-wider opacity-80">{{ $project->category->name }}</p>
                        @endif
                        <h3 class="text-lg font-bold uppercase">{{ $project->title }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
            
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- BLOQUE 5 - CLIENTES --}}
    {{-- ============================================ --}}
    <section class="bg-boom-blue py-20 px-4">
        <div class="max-w-6xl mx-auto">
            
            {{-- Texto --}}
            <div class="text-center text-white mb-12">
                <p class="text-xl md:text-2xl leading-relaxed max-w-3xl mx-auto">
                    Trabajamos conjuntamente con cada uno de nuestros clientes para encontrar la estrategia más adecuada
                </p>
            </div>
            
            {{-- Logos --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center mb-12">
                {{-- Placeholders hasta recibir logos del cliente --}}
                <div class="bg-white/20 rounded-lg px-8 py-4 text-white/60 text-sm">Logo 1</div>
                <div class="bg-white/20 rounded-lg px-8 py-4 text-white/60 text-sm">Logo 2</div>
                <div class="bg-white/20 rounded-lg px-8 py-4 text-white/60 text-sm">Logo 3</div>
                <div class="bg-white/20 rounded-lg px-8 py-4 text-white/60 text-sm">Logo 4</div>
            </div>
            
            {{-- Botón --}}
            <div class="text-center">
                <a href="{{ route('portfolio.index') }}" 
                class="inline-block border-2 border-white text-white px-8 py-3 rounded-full font-bold uppercase text-sm tracking-wider hover:bg-white hover:text-boom-blue transition">
                    Ver más
                </a>
            </div>
            
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- BLOQUE 6 - BLOG --}}
    {{-- ============================================ --}}
    <section class="bg-[#FBFAFA] py-20 px-4">
        <div class="max-w-6xl mx-auto">
            
            {{-- Intro: Imagen + Texto --}}
            <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                {{-- Imagen IZQUIERDA --}}
                <div>
                    <div class="bg-gray-200 aspect-[4/3] rounded-lg flex items-center justify-center text-gray-400">
                        <span class="text-sm">Imagen pendiente</span>
                    </div>
                </div>
                
                {{-- Texto DERECHA --}}
                <div>
                    <p class="text-lg md:text-xl text-boom-gray leading-relaxed">
                        Presentamos las últimas noticias relacionadas al mundo del marketing y proyectos destacados de boom!
                    </p>
                </div>
            </div>
            
            {{-- Cards de Blog --}}
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                @forelse($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="group">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                        @if($post->getFirstMediaUrl('featured_image'))
                            <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                                alt="{{ $post->title }}"
                                class="w-full aspect-video object-cover">
                        @else
                            <div class="w-full aspect-video bg-boom-orange"></div>
                        @endif
                        <div class="p-6">
                            @if($post->category)
                            <p class="text-xs uppercase tracking-wider text-boom-orange mb-2">{{ $post->category->name }}</p>
                            @endif
                            <h3 class="font-bold text-boom-gray group-hover:text-boom-orange transition">{{ $post->title }}</h3>
                            @if($post->published_at)
                            <p class="text-sm text-gray-400 mt-2">{{ $post->published_at->format('d/m/Y') }}</p>
                            @endif
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center text-gray-400 py-8">
                    Próximamente publicaremos novedades
                </div>
                @endforelse
            </div>
            
            {{-- Botón DEBAJO de las cards --}}
            @if($posts->count() > 0)
            <div class="text-center">
                <a href="{{ route('blog.index') }}" 
                class="inline-block border-2 border-boom-gray text-boom-gray px-8 py-3 rounded-full font-bold uppercase text-sm tracking-wider hover:bg-boom-gray hover:text-white transition">
                    Ver todas
                </a>
            </div>
            @endif
            
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- BLOQUE 7 - CONTACTO --}}
    {{-- ============================================ --}}
    <section class="bg-boom-orange py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-start">
                
                {{-- Formulario --}}
                <div class="bg-white rounded-3xl p-8 shadow-xl">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-4">
                            <input type="text" name="name" placeholder="Nombre" required 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:ring-1 focus:ring-boom-orange outline-none">
                            <input type="text" name="phone" placeholder="Teléfono"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:ring-1 focus:ring-boom-orange outline-none">
                        </div>
                        
                        <input type="email" name="email" placeholder="Email" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:ring-1 focus:ring-boom-orange outline-none">
                        
                        <input type="text" name="subject" placeholder="Asunto" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:ring-1 focus:ring-boom-orange outline-none">
                        
                        <textarea name="message" placeholder="Mensaje" rows="5" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:ring-1 focus:ring-boom-orange outline-none resize-none"></textarea>
                        
                        <button type="submit" 
                                class="bg-boom-orange text-white font-bold py-3 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all">
                            Enviar
                        </button>
                        
                        @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                        @endif
                    </form>
                </div>
                
                {{-- Info de contacto --}}
                <div class="text-white">
                    <h2 class="text-6xl md:text-8xl font-black uppercase leading-none mb-8" style="line-height: 0.85;">
                        CONT<br>
                        <span class="text-boom-gray">A</span>CTO
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Almirante Brown 3185</span>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>2235039500</span>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>contacto@boomstudio.com.ar</span>
                        </div>
                        
                        {{-- Redes sociales --}}
                        <div class="flex space-x-4 pt-4">
                            <a href="https://www.instagram.com/boomstudio.ar/" target="_blank" class="hover:opacity-80 transition">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/boomstudio.ar/" target="_blank" class="hover:opacity-80 transition">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://ar.linkedin.com/company/boomstudio-argentina" target="_blank" class="hover:opacity-80 transition">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

</x-frontend-layout>