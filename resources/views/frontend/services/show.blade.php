<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Hero Section Detalle Servicio --}}
    <section class="relative bg-boom-gray text-white py-20 px-4">
        <div class="max-w-5xl mx-auto">
            <a href="{{ route('services.index') }}" 
               class="inline-flex items-center text-boom-orange hover:text-white mb-6 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver a servicios
            </a>
            
            <div class="flex flex-col md:flex-row items-start gap-8">
                @if($service->getFirstMediaUrl('icon'))
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                             alt="{{ $service->title }}" 
                             class="w-full h-full object-contain">
                    </div>
                @endif
                
                <div class="flex-1">
                    <h1 class="text-4xl md:text-6xl font-black uppercase mb-6">
                        {{ $service->title }}
                    </h1>
                    <p class="text-xl md:text-2xl opacity-90 leading-relaxed">
                        {{ $service->description }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if($service->getFirstMediaUrl('image'))
    <section class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <img src="{{ $service->getFirstMediaUrl('image') }}" 
                 alt="{{ $service->title }}"
                 class="w-full rounded-2xl shadow-2xl">
        </div>
    </section>
    @endif

    {{-- Contenido --}}
    <article class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            @if($service->content)
                <div class="prose prose-lg max-w-none">
                    {!! $service->content !!}
                </div>
            @else
                <p class="text-gray-600 text-lg leading-relaxed">
                    {{ $service->description }}
                </p>
            @endif
        </div>
    </article>

    {{-- Otros Servicios --}}
    @if($otherServices->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-black uppercase text-boom-gray mb-12 text-center">
                Otros Servicios
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($otherServices as $otherService)
                <article class="bg-white rounded-2xl p-6 hover:shadow-xl transition-all duration-300 group">
                    @if($otherService->getFirstMediaUrl('icon'))
                        <div class="w-16 h-16 mb-4 group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ $otherService->getFirstMediaUrl('icon') }}" 
                                 alt="{{ $otherService->title }}" 
                                 class="w-full h-full object-contain">
                        </div>
                    @endif
                    
                    <h3 class="text-xl font-bold text-boom-gray mb-3 group-hover:text-boom-orange transition-colors">
                        {{ $otherService->title }}
                    </h3>
                    
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit($otherService->description, 100) }}
                    </p>
                    
                    <a href="{{ route('services.show', $otherService->slug) }}" 
                       class="inline-flex items-center text-boom-orange font-semibold hover:text-boom-gray transition-colors">
                        Ver más
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="bg-boom-orange py-20 px-4">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                ¿Interesado en {{ $service->title }}?
            </h2>
            <p class="text-xl leading-relaxed mb-8 opacity-90">
                Hablemos sobre cómo podemos ayudar a tu negocio
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block bg-white text-boom-orange font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-gray-100 transition-all transform hover:scale-105">
                Contactar ahora
            </a>
        </div>
    </section>

</x-frontend-layout>