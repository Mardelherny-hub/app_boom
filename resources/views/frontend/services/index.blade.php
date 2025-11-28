<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Header --}}
    <section class="pt-32 pb-16 hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-7xl font-black text-white uppercase mb-4">Servicios</h1>
            <p class="text-xl text-white opacity-90">Soluciones creativas integrales para potenciar tu marca</p>
        </div>
    </section>

    {{-- Services Grid --}}
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

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($services as $index => $service)
                    <a href="{{ route('services.show', $service->slug) }}" 
                       class="{{ $serviceColors[$index % 8] }} p-8 rounded-lg hover:opacity-90 hover:scale-105 transition-all duration-300">
                        <div class="w-12 h-12 mb-4">
                            @if($service->getFirstMediaUrl('icon'))
                                <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                                    alt="{{ $service->title }}" 
                                    class="w-full h-full object-contain">
                            @else
                                <svg class="w-full h-full opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            @endif
                        </div>
                        
                        <h3 class="text-xl font-bold uppercase mb-3">{{ $service->title }}</h3>
                        
                        @if($service->description)
                        <p class="text-sm opacity-90 leading-relaxed">
                            {!! nl2br(e(Str::limit($service->description, 100))) !!}
                        </p>
                        @endif
                    </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500">No hay servicios disponibles en este momento.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-boom-blue">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Listo para empezar?</h2>
            <p class="text-lg opacity-90 mb-8">
                Contanos sobre tu proyecto y te ayudamos a hacerlo realidad.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-blue transition-all">
                Contactanos
            </a>
        </div>
    </section>

</x-frontend-layout>