<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Hero Section Contacto --}}
    <section class="relative bg-boom-blue py-20 px-4 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-20 w-40 h-40 bg-white rounded-full animate-float"></div>
            <div class="absolute bottom-20 right-10 w-32 h-32 bg-white rounded-full animate-floatReverse"></div>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto text-center text-white">
            <h1 class="text-5xl md:text-7xl font-black uppercase mb-6">
                Contacto
            </h1>
            <p class="text-xl md:text-2xl opacity-90">
                Hablemos sobre tu proyecto
            </p>
        </div>
    </section>

    {{-- Sección Principal Contacto --}}
    <section class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-start">
                
                {{-- Formulario --}}
                <div class="bg-white rounded-3xl p-8 shadow-xl border-2 border-gray-100">
                    <h2 class="text-3xl font-bold text-boom-gray mb-6">Envíanos un mensaje</h2>
                    
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-boom-gray mb-2">Nombre *</label>
                                <input type="text" 
                                       id="name"
                                       name="name" 
                                       required 
                                       value="{{ old('name') }}"
                                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-boom-orange focus:outline-none transition-colors @error('name') border-red-500 @enderror">
                                @error('name')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-semibold text-boom-gray mb-2">Email *</label>
                                <input type="email" 
                                       id="email"
                                       name="email" 
                                       required
                                       value="{{ old('email') }}"
                                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-boom-orange focus:outline-none transition-colors @error('email') border-red-500 @enderror">
                                @error('email')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-boom-gray mb-2">Teléfono</label>
                                <input type="tel" 
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-boom-orange focus:outline-none transition-colors @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-semibold text-boom-gray mb-2">Asunto *</label>
                                <input type="text" 
                                       id="subject"
                                       name="subject" 
                                       required
                                       value="{{ old('subject') }}"
                                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-boom-orange focus:outline-none transition-colors @error('subject') border-red-500 @enderror">
                                @error('subject')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-semibold text-boom-gray mb-2">Mensaje *</label>
                            <textarea id="message"
                                      name="message" 
                                      rows="5" 
                                      required
                                      class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-boom-orange focus:outline-none resize-none transition-colors @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-boom-pink text-boom-gray font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-boom-orange hover:text-white transition-all transform hover:scale-105">
                            Enviar Mensaje
                        </button>
                        
                        @if(session('success'))
                            <div class="bg-green-100 border-2 border-green-400 text-green-700 px-4 py-3 rounded-lg">
                                <p class="font-semibold">¡Mensaje enviado!</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 rounded-lg">
                                <p class="font-semibold">Error</p>
                                <p class="text-sm">{{ session('error') }}</p>
                            </div>
                        @endif
                    </form>
                </div>
                
                {{-- Información de Contacto --}}
                <div class="text-boom-gray">
                    <h2 class="text-7xl md:text-8xl font-black uppercase leading-none mb-8" style="line-height: 0.85;">
                        CONT<br>
                        <span class="text-boom-orange">A</span>CTO
                    </h2>
                    
                    <p class="text-lg leading-relaxed mb-12 text-gray-600">
                        ¿Tenés un proyecto en mente? Estamos acá para escucharte y ayudarte a hacerlo realidad. Completá el formulario y nos pondremos en contacto lo antes posible.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-full bg-boom-orange/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-boom-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Ubicación</p>
                                <p class="text-lg font-medium">{{ settings('address', 'Buenos Aires, Argentina') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-full bg-boom-blue/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-boom-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Teléfono</p>
                                <p class="text-lg font-medium">{{ settings('contact_phone', '+54 9 11 1234-5678') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-full bg-boom-pink/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-boom-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Email</p>
                                <p class="text-lg font-medium">{{ settings('contact_email', 'hola@boomstudio.com') }}</p>
                            </div>
                        </div>
                        
                        @if(settings('social_instagram') || settings('social_facebook') || settings('social_linkedin'))
                        <div class="pt-6 border-t border-gray-200">
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Seguinos</p>
                            <div class="flex space-x-4">
                                @if(settings('social_instagram'))
                                    <a href="{{ settings('social_instagram') }}" 
                                       target="_blank"
                                       class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-600 to-pink-500 text-white flex items-center justify-center hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </a>
                                @endif
                                
                                @if(settings('social_facebook'))
                                    <a href="{{ settings('social_facebook') }}" 
                                       target="_blank"
                                       class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </a>
                                @endif
                                
                                @if(settings('social_linkedin'))
                                    <a href="{{ settings('social_linkedin') }}" 
                                       target="_blank"
                                       class="w-10 h-10 rounded-full bg-blue-700 text-white flex items-center justify-center hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
