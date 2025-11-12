<x-frontend-layout >

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Hero Section con gradiente animado --}}
    <section id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden hero-gradient">
        {{-- Formas flotantes decorativas --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-32 h-32 bg-white/20 rounded-full animate-float"></div>
            <div class="absolute top-40 right-20 w-24 h-24 bg-white/20 rounded-full animate-floatReverse"></div>
            <div class="absolute bottom-32 left-1/4 w-40 h-40 bg-white/20 rounded-full animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-1/3 w-20 h-20 bg-white/20 rounded-full animate-float"></div>
        </div>
        
        {{-- Contenido --}}
        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
            <h1 class="text-6xl md:text-8xl font-black uppercase text-white leading-tight mb-6 animate-fadeInUp">
                Creatividad<br>
                que <span class="text-boom-orange">marca</span><br>
                la diferencia
            </h1>
            
            <p class="text-xl md:text-2xl text-white/90 mb-10 max-w-2xl mx-auto animate-fadeInUp delay-200">
                Diseño gráfico y digital que potencia tu marca con identidad única y memorable
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fadeInUp delay-400">
                <a href="#portfolio" 
                   class="bg-white text-boom-gray font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                    Ver Portfolio
                </a>
                <a href="#contacto" 
                   class="bg-boom-orange text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                    Contactar
                </a>
            </div>
        </div>
        
        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- Sección Servicios --}}
    @if($services->count() > 0)
    <section id="servicios" class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black uppercase text-boom-gray mb-4">
                    Nuestros Servicios
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Soluciones creativas integrales para potenciar tu marca
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="bg-white border-2 border-gray-100 rounded-2xl p-8 hover:border-boom-orange hover:shadow-xl transition-all duration-300 group">
                    @if($service->getFirstMediaUrl('icon'))
                        <div class="w-16 h-16 mb-6 group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                                 alt="{{ $service->title }}" 
                                 class="w-full h-full object-contain">
                        </div>
                    @else
                        <div class="w-16 h-16 mb-6 bg-boom-orange/10 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-boom-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    @endif
                    
                    <h3 class="text-2xl font-bold uppercase text-boom-gray mb-3 group-hover:text-boom-orange transition-colors">
                        {{ $service->title }}
                    </h3>
                    
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ Str::limit($service->description, 150) }}
                    </p>
                    
                    <a href="{{ route('services.show', $service->slug) }}" 
                       class="inline-flex items-center text-boom-orange font-semibold hover:text-boom-gray transition-colors group">
                        Ver más
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
            
            @if($services->count() >= 6)
            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}" 
                   class="inline-block bg-boom-gray text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-boom-orange transition-all transform hover:scale-105">
                    Ver todos los servicios
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Sección Nosotros --}}
    <section id="nosotros" class="py-20 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Texto --}}
                <div>
                    <h2 class="text-4xl md:text-5xl font-black uppercase text-boom-gray mb-6">
                        ¿Quiénes<br>
                        <span class="text-boom-orange">somos?</span>
                    </h2>
                    
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Somos un estudio de diseño gráfico con más de 10 años de experiencia creando identidades visuales únicas y memorables.
                    </p>
                    
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Nos especializamos en branding, diseño editorial, web y packaging. Trabajamos con marcas que buscan diferenciarse y conectar emocionalmente con su audiencia.
                    </p>
                    
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Nuestro enfoque combina estrategia, creatividad y atención al detalle para resultados que realmente impactan.
                    </p>
                </div>
                
                {{-- Imagen/Ilustración --}}
                <div class="relative">
                    <div class="aspect-square bg-gradient-to-br from-boom-blue to-boom-pink rounded-3xl overflow-hidden shadow-2xl">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-white text-center p-8">
                                <svg class="w-32 h-32 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <p class="text-2xl font-bold">Creatividad + Estrategia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Portfolio Grid --}}
    @if($projects->count() > 0)
    <section id="portfolio" class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black uppercase text-boom-gray mb-4">
                    Portfolio
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Algunos de nuestros proyectos más destacados
                </p>
            </div>
            
            {{-- Grid masonry style --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $index => $project)
                    @php
                        // Colores alternados para el grid
                        $gradients = [
                            'from-purple-500 to-pink-500',
                            'from-blue-500 to-cyan-500',
                            'from-orange-500 to-red-500',
                            'from-green-500 to-teal-500',
                            'from-indigo-500 to-purple-500',
                            'from-yellow-400 to-orange-500',
                        ];
                        $gradient = $gradients[$index % count($gradients)];
                    @endphp
                    
                    <a href="{{ route('portfolio.show', $project->slug) }}" 
                       class="relative aspect-square bg-gradient-to-br {{ $gradient }} rounded-lg overflow-hidden group cursor-pointer hover:scale-105 transition-transform duration-300 shadow-lg hover:shadow-2xl">
                        
                        @if($project->getFirstMediaUrl('featured_image'))
                            <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                                 alt="{{ $project->title }}"
                                 class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif
                        
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-40 transition-opacity duration-300"></div>
                        
                        <div class="absolute bottom-4 left-4 text-white">
                            @if($project->category)
                                <p class="text-xs uppercase tracking-wider opacity-80 mb-1">{{ $project->category->name }}</p>
                            @endif
                            <h3 class="text-xl font-bold uppercase">{{ Str::limit($project->title, 20) }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
            
            @if($projects->count() >= 6)
            <div class="text-center mt-12">
                <a href="{{ route('portfolio.index') }}" 
                   class="inline-block bg-boom-orange text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                    Ver todo el portfolio
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Blog / Últimas Noticias --}}
    @if($posts->count() > 0)
    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black uppercase text-boom-gray mb-4">
                    Blog
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Últimas noticias, tendencias y consejos de diseño
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
                    @if($post->getFirstMediaUrl('featured_image'))
                        <div class="aspect-video overflow-hidden">
                            <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                                 alt="{{ $post->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                    @else
                        <div class="aspect-video bg-gradient-to-br from-boom-blue to-boom-pink"></div>
                    @endif
                    
                    <div class="p-6">
                        @if($post->category)
                            <span class="inline-block bg-boom-orange/10 text-boom-orange text-xs font-semibold uppercase tracking-wider px-3 py-1 rounded-full mb-3">
                                {{ $post->category->name }}
                            </span>
                        @endif
                        
                        <h3 class="text-xl font-bold text-boom-gray mb-3 group-hover:text-boom-orange transition-colors line-clamp-2">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <span>{{ $post->published_at->format('d M Y') }}</span>
                            <a href="{{ route('blog.show', $post->slug) }}" 
                               class="text-boom-orange font-semibold hover:text-boom-gray transition-colors">
                                Leer más →
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            
            @if($posts->count() >= 3)
            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}" 
                   class="inline-block bg-boom-gray text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-boom-orange transition-all transform hover:scale-105">
                    Ver todos los artículos
                </a>
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Sección CTA Celeste --}}
    <section class="bg-boom-blue py-20 px-4">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                ¿Querés trabajar con nosotros?
            </h2>
            <p class="text-lg leading-relaxed mb-8 opacity-90">
                Potenciamos marcas con identidad y diseño impactante. Creamos experiencias visuales únicas y memorables que hacen la diferencia en el mercado.
            </p>
            <a href="#contacto" 
               class="inline-block bg-white text-boom-blue font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                Comenzar proyecto
            </a>
        </div>
    </section>

    {{-- Logos Clientes --}}
    <section class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-2xl font-bold uppercase text-center mb-12 text-boom-gray">Trabajamos con</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center opacity-60">
                <div class="text-3xl md:text-4xl font-bold text-boom-gray hover:opacity-100 transition-opacity">DENTAL</div>
                <div class="text-3xl md:text-4xl font-bold text-boom-gray hover:opacity-100 transition-opacity">DECK</div>
                <div class="text-3xl md:text-4xl font-bold text-boom-gray hover:opacity-100 transition-opacity">GO</div>
                <div class="text-3xl md:text-4xl font-bold text-boom-gray hover:opacity-100 transition-opacity">+</div>
            </div>
        </div>
    </section>

    {{-- Contacto --}}
    <section id="contacto" class="bg-boom-blue py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-start">
                {{-- Formulario --}}
                <div class="bg-white rounded-3xl p-8 shadow-xl">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <input type="text" name="name" placeholder="Nombre" required 
                                       value="{{ old('name') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:outline-none focus:ring-2 focus:ring-boom-orange/20">
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <input type="email" name="email" placeholder="Email" required
                                       value="{{ old('email') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:outline-none focus:ring-2 focus:ring-boom-orange/20">
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <input type="tel" name="phone" placeholder="Teléfono"
                                       value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:outline-none focus:ring-2 focus:ring-boom-orange/20">
                                @error('phone')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <input type="text" name="subject" placeholder="Asunto" required
                                       value="{{ old('subject') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:outline-none focus:ring-2 focus:ring-boom-orange/20">
                                @error('subject')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <textarea name="message" placeholder="Mensaje" rows="5" required
                                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-boom-orange focus:outline-none focus:ring-2 focus:ring-boom-orange/20 resize-none">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" 
                                class="bg-boom-pink text-boom-gray font-bold py-3 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                            Enviar
                        </button>
                        
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
                
                {{-- Ilustración CONTACTO --}}
                <div class="text-white">
                    <h2 class="text-7xl md:text-9xl font-black uppercase leading-none mb-8" style="line-height: 0.85;">
                        CONT<br>
                        <span class="text-boom-orange">A</span>CTO
                    </h2>
                    
                    <div class="space-y-4 mt-12">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{{ settings('address', 'Buenos Aires, Argentina') }}</span>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>{{ settings('contact_phone', '+54 9 11 1234-5678') }}</span>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ settings('contact_email', 'hola@boomstudio.com') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mapa / Ubicación --}}
    <section class="h-96 bg-gray-200 relative">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center text-gray-500">
            <div class="text-center">
                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <p class="text-sm font-medium">{{ settings('city', 'Mar del Plata') }}, {{ settings('province', 'Buenos Aires') }}</p>
            </div>
        </div>
        
        {{-- Si tienes Google Maps API configurado, puedes descomentar esto:
        <iframe 
            src="https://www.google.com/maps/embed?pb=YOUR_EMBED_CODE_HERE"
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        --}}
    </section>

</x-frontend-layout>