<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Header --}}
    <section class="pt-32 pb-16 bg-boom-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('portfolio.index') }}" 
               class="inline-flex items-center text-white opacity-80 hover:opacity-100 mb-6 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver al portfolio
            </a>
            
            @if($project->category)
            <p class="text-boom-orange uppercase tracking-wider text-sm font-medium mb-2">{{ $project->category->name }}</p>
            @endif
            
            <h1 class="text-4xl md:text-6xl font-black text-white uppercase mb-4">{{ $project->title }}</h1>
            
            @if($project->description)
            <p class="text-xl text-white opacity-80 max-w-3xl">{{ $project->description }}</p>
            @endif
            
            @if($project->client || $project->project_date)
            <div class="flex flex-wrap gap-6 mt-6 text-white opacity-70 text-sm">
                @if($project->client)
                <div>
                    <span class="uppercase tracking-wider">Cliente:</span> {{ $project->client }}
                </div>
                @endif
                @if($project->project_date)
                <div>
                    <span class="uppercase tracking-wider">Fecha:</span> {{ $project->project_date->format('M Y') }}
                </div>
                @endif
            </div>
            @endif
        </div>
    </section>

    {{-- Featured Image --}}
    @if($project->getFirstMediaUrl('featured_image'))
    <section class="bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                 alt="{{ $project->title }}"
                 class="w-full h-64 md:h-[500px] object-cover">
        </div>
    </section>
    @endif

    {{-- Content --}}
    @if($project->content)
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                {!! $project->content !!}
            </div>
        </div>
    </section>
    @endif

    {{-- Gallery --}}
    @if($project->getMedia('gallery')->count() > 0)
    <section class="py-16 bg-gray-100" x-data="{ lightbox: false, activeImage: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-boom-gray mb-8 text-center">Galería</h2>
            
            @php $galleryImages = $project->getMedia('gallery'); @endphp
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($galleryImages as $index => $image)
                <button @click="lightbox = true; activeImage = {{ $index }}" 
                        class="block overflow-hidden rounded-lg focus:outline-none focus:ring-2 focus:ring-boom-orange">
                    <img src="{{ $image->getUrl() }}" 
                        alt="{{ $project->title }}"
                        class="w-full h-48 md:h-64 object-cover hover:scale-105 transition-transform duration-300">
                </button>
                @endforeach
            </div>
        </div>
        
        {{-- Lightbox Modal --}}
        <div x-show="lightbox" 
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @keydown.escape.window="lightbox = false"
            @keydown.arrow-left.window="activeImage = activeImage > 0 ? activeImage - 1 : {{ count($galleryImages) - 1 }}"
            @keydown.arrow-right.window="activeImage = activeImage < {{ count($galleryImages) - 1 }} ? activeImage + 1 : 0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4">
            
            {{-- Close button --}}
            <button @click="lightbox = false" 
                    class="absolute top-4 right-4 text-white hover:text-boom-orange transition z-10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            
            {{-- Previous button --}}
            <button @click="activeImage = activeImage > 0 ? activeImage - 1 : {{ count($galleryImages) - 1 }}" 
                    class="absolute left-4 text-white hover:text-boom-orange transition z-10">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            
            {{-- Next button --}}
            <button @click="activeImage = activeImage < {{ count($galleryImages) - 1 }} ? activeImage + 1 : 0" 
                    class="absolute right-4 text-white hover:text-boom-orange transition z-10">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
            
            {{-- Image --}}
            <div class="max-w-5xl max-h-[80vh] flex items-center justify-center">
                @foreach($galleryImages as $index => $image)
                <img x-show="activeImage === {{ $index }}"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    src="{{ $image->getUrl() }}" 
                    alt="{{ $project->title }}"
                    class="max-w-full max-h-[80vh] object-contain rounded-lg">
                @endforeach
            </div>
            
            {{-- Counter --}}
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white text-sm">
                <span x-text="activeImage + 1"></span> / {{ count($galleryImages) }}
            </div>
        </div>
    </section>
    @endif

    {{-- Related Projects --}}
    @if($relatedProjects->count() > 0)
    @php
    $projectColors = [
        'from-yellow-400 to-orange-400',
        'from-green-400 to-emerald-500',
        'from-purple-500 to-violet-600',
        'from-boom-blue to-cyan-500',
    ];
    @endphp
    
    <section class="py-16 bg-boom-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Proyectos relacionados</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedProjects as $index => $related)
                <a href="{{ route('portfolio.show', $related->slug) }}" 
                   class="relative aspect-square rounded-lg overflow-hidden group">
                    @if($related->getFirstMediaUrl('featured_image'))
                        <img src="{{ $related->getFirstMediaUrl('featured_image') }}" 
                             alt="{{ $related->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-50 transition-opacity"></div>
                    @else
                        <div class="w-full h-full bg-gradient-to-br {{ $projectColors[$index % 4] }}"></div>
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition-opacity"></div>
                    @endif
                    <div class="absolute bottom-4 left-4 text-white">
                        @if($related->category)
                        <p class="text-xs uppercase tracking-wider opacity-80">{{ $related->category->name }}</p>
                        @endif
                        <h3 class="text-lg font-bold uppercase">{{ $related->title }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-20 bg-boom-blue">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Te gustó este proyecto?</h2>
            <p class="text-lg opacity-90 mb-8">
                Podemos crear algo igual de increíble para tu marca.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-blue transition-all">
                Contactanos
            </a>
        </div>
    </section>

</x-frontend-layout>