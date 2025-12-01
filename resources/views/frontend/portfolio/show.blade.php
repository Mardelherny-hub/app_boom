<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Header --}}
    <section class="bg-boom-blue pt-32 pb-12 px-4">
        <div class="max-w-4xl mx-auto">
            @if($project->category)
            <p class="text-white/80 text-sm uppercase tracking-wider mb-2">{{ $project->category->name }}</p>
            @endif
            <h1 class="text-3xl md:text-5xl font-black text-white uppercase leading-tight">
                {{ $project->title }}
            </h1>
            @if($project->client)
            <p class="text-white/80 mt-4">Cliente: {{ $project->client }}</p>
            @endif
        </div>
    </section>

    {{-- Imagen destacada --}}
    @if($project->getFirstMediaUrl('featured_image'))
    <div class="max-w-4xl mx-auto px-4 -mt-6">
        <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
             alt="{{ $project->title }}"
             class="w-full aspect-video object-cover rounded-lg shadow-xl">
    </div>
    @endif

    {{-- Contenido --}}
    <article class="py-12 px-4">
        <div class="max-w-4xl mx-auto">
            
            {{-- Descripción --}}
            @if($project->description)
            <p class="text-xl text-boom-gray leading-relaxed mb-8">
                {{ $project->description }}
            </p>
            @endif

            {{-- Contenido completo --}}
            @if($project->content)
            <div class="prose prose-lg max-w-none text-boom-gray">
                {!! $project->content !!}
            </div>
            @endif

            {{-- Galería --}}
            @if($project->getMedia('gallery')->count() > 0)
            <div class="mt-12">
                <h3 class="text-xl font-bold text-boom-gray mb-6">Galería</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($project->getMedia('gallery') as $image)
                    <a href="{{ $image->getUrl() }}" target="_blank" class="block">
                        <img src="{{ $image->getUrl() }}" 
                             alt="{{ $project->title }}"
                             class="w-full aspect-square object-cover rounded-lg hover:opacity-90 transition">
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Botón volver --}}
            <div class="mt-12 pt-8 border-t border-gray-200">
                <a href="{{ route('portfolio.index') }}" 
                   class="inline-block border-2 border-boom-gray text-boom-gray px-8 py-3 rounded-full font-bold uppercase text-sm tracking-wider hover:bg-boom-gray hover:text-white transition">
                    ← Ver todos los proyectos
                </a>
            </div>
        </div>
    </article>

    {{-- Proyectos relacionados --}}
    @if($relatedProjects->count() > 0)
    <section class="bg-[#FBFAFA] py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl font-bold text-boom-gray mb-8">Proyectos relacionados</h2>
            
            @php
            $projectColors = ['bg-boom-orange', 'bg-boom-blue', 'bg-boom-green', 'bg-boom-pink'];
            @endphp
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($relatedProjects as $index => $relatedProject)
                <a href="{{ route('portfolio.show', $relatedProject->slug) }}" 
                   class="relative aspect-square rounded-lg overflow-hidden group">
                    @if($relatedProject->getFirstMediaUrl('featured_image'))
                        <img src="{{ $relatedProject->getFirstMediaUrl('featured_image') }}" 
                             alt="{{ $relatedProject->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-40 transition-opacity"></div>
                    @else
                        <div class="w-full h-full {{ $projectColors[$index % 4] }}"></div>
                    @endif
                    <div class="absolute bottom-4 left-4 text-white">
                        @if($relatedProject->category)
                        <p class="text-xs uppercase tracking-wider opacity-80">{{ $relatedProject->category->name }}</p>
                        @endif
                        <h3 class="text-lg font-bold uppercase">{{ $relatedProject->title }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</x-frontend-layout>