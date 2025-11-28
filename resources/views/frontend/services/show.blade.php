<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Header --}}
    <section class="pt-32 pb-16 bg-boom-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('services.index') }}" 
               class="inline-flex items-center text-white opacity-80 hover:opacity-100 mb-6 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Todos los servicios
            </a>
            
            <div class="flex items-start gap-6">
                <div class="w-16 h-16 flex-shrink-0 text-boom-orange">
                    @if($service->getFirstMediaUrl('icon'))
                        <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                             alt="{{ $service->title }}" 
                             class="w-full h-full object-contain">
                    @else
                        <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    @endif
                </div>
                
                <div>
                    <h1 class="text-4xl md:text-5xl font-black text-white uppercase mb-4">{{ $service->title }}</h1>
                    @if($service->description)
                    <p class="text-xl text-white opacity-80">{{ $service->description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if($service->getFirstMediaUrl('image'))
    <section class="bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <img src="{{ $service->getFirstMediaUrl('image') }}" 
                 alt="{{ $service->title }}"
                 class="w-full h-64 md:h-96 object-cover">
        </div>
    </section>
    @endif

    {{-- Content --}}
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($service->content)
                <div class="prose prose-lg max-w-none">
                    {!! $service->content !!}
                </div>
            @endif
        </div>
    </section>

    {{-- Other Services --}}
    @if($otherServices->count() > 0)
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
    
    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-boom-gray mb-8 text-center">Otros servicios</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($otherServices as $index => $otherService)
                <a href="{{ route('services.show', $otherService->slug) }}" 
                   class="{{ $serviceColors[$index % 8] }} p-8 rounded-lg hover:opacity-90 hover:scale-105 transition-all duration-300">
                    <div class="w-12 h-12 mb-4">
                        @if($otherService->getFirstMediaUrl('icon'))
                            <img src="{{ $otherService->getFirstMediaUrl('icon') }}" 
                                 alt="{{ $otherService->title }}" 
                                 class="w-full h-full object-contain">
                        @else
                            <svg class="w-full h-full opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        @endif
                    </div>
                    
                    <h3 class="text-xl font-bold uppercase mb-2">{{ $otherService->title }}</h3>
                    
                    @if($otherService->description)
                    <p class="text-sm opacity-90">{{ Str::limit($otherService->description, 60) }}</p>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-20 bg-boom-blue">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Te interesa este servicio?</h2>
            <p class="text-lg opacity-90 mb-8">
                Contactanos y te contamos cómo podemos ayudarte.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-blue transition-all">
                Solicitar presupuesto
            </a>
        </div>
    </section>

</x-frontend-layout>