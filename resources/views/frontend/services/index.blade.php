<x-frontend-layout>

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Hero Section Servicios --}}
    <section class="relative bg-gradient-to-br from-boom-blue via-boom-pink to-boom-green py-20 px-4 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
            <div class="absolute bottom-20 right-20 w-40 h-40 bg-white rounded-full animate-floatReverse"></div>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto text-center text-white">
            <h1 class="text-5xl md:text-7xl font-black uppercase mb-6">
                Servicios
            </h1>
            <p class="text-xl md:text-2xl opacity-90">
                Soluciones creativas integrales para potenciar tu marca
            </p>
        </div>
    </section>

    {{-- Servicios Grid --}}
    <section class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            
            @if($services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                    <article class="bg-white border-2 border-gray-100 rounded-2xl p-8 hover:border-boom-orange hover:shadow-2xl transition-all duration-300 group">
                        
                        @if($service->getFirstMediaUrl('icon'))
                            <div class="w-20 h-20 mb-6 group-hover:scale-110 transition-transform duration-300">
                                <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-full h-full object-contain">
                            </div>
                        @else
                            <div class="w-20 h-20 mb-6 bg-boom-orange/10 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-boom-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <h2 class="text-2xl font-bold uppercase text-boom-gray mb-4 group-hover:text-boom-orange transition-colors">
                            {{ $service->title }}
                        </h2>
                        
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ Str::limit($service->description, 180) }}
                        </p>
                        
                        <a href="{{ route('services.show', $service->slug) }}" 
                           class="inline-flex items-center text-boom-orange font-bold hover:text-boom-gray transition-colors group">
                            Ver más
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-500 mb-2">No hay servicios disponibles</h3>
                    <p class="text-gray-400">Pronto agregaremos nuevos servicios</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-boom-blue py-20 px-4">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                ¿Listo para impulsar tu marca?
            </h2>
            <p class="text-lg leading-relaxed mb-8 opacity-90">
                Trabajemos juntos para crear algo increíble que marque la diferencia
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block bg-white text-boom-blue font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                Contactar ahora
            </a>
        </div>
    </section>

</x-frontend-layout>