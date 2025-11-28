<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- ============================================ --}}
    {{-- HERO SECTION --}}
    {{-- ============================================ --}}
    <section id="inicio" class="pt-20 hero-gradient min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Elementos flotantes animados -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 right-20 w-64 h-64 bg-boom-orange opacity-30 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-boom-pink opacity-30 rounded-full blur-3xl animate-floatReverse"></div>
            <div class="absolute top-1/2 left-1/4 w-48 h-48 bg-white opacity-20 rounded-full blur-2xl animate-float" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-1/3 right-1/3 w-72 h-72 bg-boom-green opacity-20 rounded-full blur-3xl animate-floatReverse" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto">
            <h1 class="text-7xl md:text-9xl font-black uppercase text-white mb-6 animate-fadeInUp" style="line-height: 0.9;">
                DISEÑO<br>CREATIVO
            </h1>
            <p class="text-xl md:text-2xl text-white mb-8 opacity-90 animate-fadeInUp delay-200">
                Transformamos ideas en experiencias visuales
            </p>
            <a href="{{ route('portfolio.index') }}" 
               class="inline-block bg-boom-orange text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-opacity-90 transition-all animate-fadeInUp delay-400 animate-pulse-slow">
                Ver más
            </a>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- SECCIÓN NEGRA - BOOM! --}}
    {{-- ============================================ --}}
    <section class="bg-boom-gray py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-8xl md:text-9xl font-script text-boom-orange">boom!</h2>
                </div>
                <div class="text-white">
                    <p class="text-lg leading-relaxed mb-6">
                        Boom! Studio es un dinámico equipo de marketing dirigido por jóvenes creativos que viene a disfrutar y a contagiar entusiasmo.
                    </p>
                    <p class="text-base leading-relaxed opacity-90">
                        Especializados en transformar ideas frescas y juveniles en estrategias innovadoras, fusionan conceptos disruptivos en el ámbito digital y físico.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- SECCIÓN FUCSIA - SÉ BOOM! --}}
    {{-- ============================================ --}}
    <section class="bg-boom-pink py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-5xl md:text-7xl font-black uppercase leading-none text-white mb-6">
                        SÉ <span class="font-script text-7xl md:text-8xl text-boom-orange">boom!</span><br>
                        TOMÁ<br>
                        RIESGOS
                    </h2>
                </div>
                <div class="text-boom-gray">
                    <p class="text-lg leading-relaxed">
                        No tengas miedo de destacar y experimentar con tu identidad de marca. Con una forma atractiva y fresca de comunicar, convertimos esas ideas en campañas impactantes que capturan la atención del público.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- GRID DE SERVICIOS --}}
    {{-- ============================================ --}}
    @php
    $serviceColors = [
        'bg-boom-orange text-white',
        'bg-boom-blue text-white',
        'bg-boom-green text-boom-gray',
        'bg-boom-pink text-boom-gray',
        'bg-boom-gray text-white',
        'bg-yellow-400 text-boom-gray',
        'bg-purple-500 text-white',
        'bg-red-500 text-white',
    ];
    @endphp

    <section id="servicios" class="py-16 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($services as $index => $service)
                <a href="{{ route('services.show', $service->slug) }}" 
                   class="{{ $serviceColors[$index % 8] }} p-6 md:p-8 hover:opacity-90 transition-opacity">
                    <h3 class="text-lg md:text-xl font-bold uppercase mb-2">{{ $service->title }}</h3>
                    @if($service->description)
                    <p class="text-sm opacity-90 leading-relaxed">
                        {!! nl2br(e(Str::limit($service->description, 80))) !!}
                    </p>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- PORTAFOLIO --}}
    {{-- ============================================ --}}
    @php
    $projectColors = [
        'from-yellow-400 to-orange-400',
        'from-green-400 to-emerald-500',
        'from-purple-500 to-violet-600',
        'from-blue-400 to-cyan-500',
        'from-pink-400 to-rose-500',
        'from-red-500 to-orange-500',
        'from-indigo-500 to-purple-600',
        'from-teal-400 to-cyan-500',
        'from-amber-400 to-yellow-500',
        'from-fuchsia-500 to-pink-500',
        'from-lime-400 to-green-500',
        'from-sky-400 to-blue-500',
        'from-orange-400 to-red-500',
        'from-violet-500 to-purple-600',
        'from-emerald-400 to-teal-500',
    ];
    @endphp

    <section id="portfolio" class="bg-boom-gray py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-5xl md:text-7xl font-black text-white uppercase tracking-tight">
                    PORT<span class="text-boom-orange">F</span>OLIO
                </h2>
                <p class="text-white opacity-80 mt-4">Algunos de nuestros trabajos recientes</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($projects as $index => $project)
                <a href="{{ route('portfolio.show', $project->slug) }}" 
                   class="relative aspect-square rounded-lg overflow-hidden group cursor-pointer">
                    @if($project->getFirstMediaUrl('featured_image'))
                        <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-50 transition-opacity"></div>
                    @else
                        <div class="w-full h-full bg-gradient-to-br {{ $projectColors[$index % 15] }}"></div>
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition-opacity"></div>
                    @endif
                    <div class="absolute bottom-4 left-4 text-white">
                        @if($project->category)
                        <p class="text-xs uppercase tracking-wider opacity-80">{{ $project->category->name }}</p>
                        @endif
                        <h3 class="text-lg md:text-xl font-bold uppercase">{{ $project->title }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('portfolio.index') }}" 
                   class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-gray transition-all">
                    Ver todos
                </a>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- CTA CELESTE --}}
    {{-- ============================================ --}}
    <section class="bg-boom-blue py-20 px-4">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-3xl md:text-5xl font-bold mb-6">
                ¿Querés trabajar con nosotros?
            </h2>
            <p class="text-lg leading-relaxed mb-8 opacity-90">
                Potenciamos marcas con identidad y diseño impactante. Creamos experiencias visuales únicas y memorables que hacen la diferencia en el mercado.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-blue transition-all">
                Comenzar proyecto
            </a>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- LOGOS CLIENTES --}}
    {{-- ============================================ --}}
    <section class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-2xl font-bold uppercase text-center mb-12 text-boom-gray">Trabajamos con</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center opacity-60">
                <div class="text-3xl md:text-4xl font-bold text-boom-gray">DENTAL</div>
                <div class="text-3xl md:text-4xl font-bold text-boom-gray">DECK</div>
                <div class="text-3xl md:text-4xl font-bold text-boom-gray">GO</div>
                <div class="text-3xl md:text-4xl font-bold text-boom-gray">+</div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- CONTACTO --}}
    {{-- ============================================ --}}
    <section id="contacto" class="bg-boom-blue py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-start">
                <!-- Formulario -->
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
                
                <!-- Texto CONTACTO -->
                <div class="text-white">
                    <h2 class="text-7xl md:text-9xl font-black uppercase leading-none mb-6" style="line-height: 0.85;">
                        CONT<br>
                        <span class="text-boom-orange">A</span>CTO
                    </h2>
                    
                    <div class="space-y-4 mt-12">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Buenos Aires, Argentina</span>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>+54 9 11 1234-5678</span>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>hola@boomstudio.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- MAPA --}}
    {{-- ============================================ --}}
    <section class="h-64 md:h-96 bg-gray-200 relative">
        <div class="absolute inset-0 bg-gray-300 flex items-center justify-center text-gray-500">
            <div class="text-center">
                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <p class="text-sm">Mar del Plata, Buenos Aires</p>
            </div>
        </div>
    </section>

</x-frontend-layout>