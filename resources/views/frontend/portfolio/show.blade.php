<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Hero Section Detalle Proyecto --}}
    <section class="relative bg-boom-gray text-white py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <a href="{{ route('portfolio.index') }}" 
               class="inline-flex items-center text-boom-orange hover:text-white mb-6 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver al portfolio
            </a>
            
            <div class="flex flex-col md:flex-row items-start justify-between gap-8">
                <div class="flex-1">
                    @if($project->category)
                        <span class="inline-block bg-boom-orange/20 text-boom-orange px-4 py-1 rounded-full text-sm font-semibold uppercase tracking-wider mb-4">
                            {{ $project->category->name }}
                        </span>
                    @endif
                    
                    <h1 class="text-4xl md:text-6xl font-black uppercase mb-6">
                        {{ $project->title }}
                    </h1>
                    
                    <p class="text-xl opacity-90 leading-relaxed">
                        {{ $project->description }}
                    </p>
                </div>
                
                @if($project->client_name || $project->project_date)
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 space-y-4">
                        @if($project->client_name)
                            <div>
                                <p class="text-xs uppercase tracking-wider text-boom-green mb-1">Cliente</p>
                                <p class="font-bold">{{ $project->client_name }}</p>
                            </div>
                        @endif
                        
                        @if($project->project_date)
                            <div>
                                <p class="text-xs uppercase tracking-wider text-boom-green mb-1">Fecha</p>
                                <p class="font-bold">{{ $project->project_date->format('Y') }}</p>
                            </div>
                        @endif
                        
                        @if($project->project_url)
                            <div>
                                <a href="{{ $project->project_url }}" 
                                   target="_blank"
                                   class="inline-flex items-center text-boom-orange hover:text-white transition-colors font-semibold">
                                    Ver proyecto
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if($project->getFirstMediaUrl('featured_image'))
    <section class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                 alt="{{ $project->title }}"
                 class="w-full rounded-2xl shadow-2xl">
        </div>
    </section>
    @endif

    {{-- Contenido --}}
    <article class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            @if($project->content)
                <div class="prose prose-lg max-w-none mb-12">
                    {!! $project->content !!}
                </div>
            @endif
        </div>
    </article>

    {{-- Galería de Imágenes --}}
    @if($project->getMedia('gallery')->count() > 0)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-black uppercase text-boom-gray mb-12 text-center">
                Galería
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($project->getMedia('gallery') as $image)
                    <div class="aspect-square rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow">
                        <img src="{{ $image->getUrl() }}" 
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Proyectos Relacionados --}}
    @if($relatedProjects->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-black uppercase text-boom-gray mb-12 text-center">
                Proyectos Relacionados
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedProjects as $index => $relatedProject)
                    @php
                        $gradients = [
                            'from-purple-500 to-pink-500',
                            'from-blue-500 to-cyan-500',
                            'from-orange-500 to-red-500',
                        ];
                        $gradient = $gradients[$index % count($gradients)];
                    @endphp
                    
                    <a href="{{ route('portfolio.show', $relatedProject->slug) }}" 
                       class="relative aspect-square bg-gradient-to-br {{ $gradient }} rounded-2xl overflow-hidden group cursor-pointer hover:scale-105 transition-transform duration-300 shadow-lg">
                        
                        @if($relatedProject->getFirstMediaUrl('featured_image'))
                            <img src="{{ $relatedProject->getFirstMediaUrl('featured_image') }}" 
                                 alt="{{ $relatedProject->title }}"
                                 class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-80"></div>
                        
                        <div class="absolute bottom-4 left-4 text-white">
                            @if($relatedProject->category)
                                <p class="text-xs uppercase tracking-wider mb-1 text-boom-green">
                                    {{ $relatedProject->category->name }}
                                </p>
                            @endif
                            <h3 class="text-xl font-bold uppercase">
                                {{ Str::limit($relatedProject->title, 30) }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('portfolio.index') }}" 
                   class="inline-block bg-boom-orange text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                    Ver todo el portfolio
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="bg-boom-blue py-20 px-4">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                ¿Te gustó este proyecto?
            </h2>
            <p class="text-xl leading-relaxed mb-8 opacity-90">
                Podemos crear algo único para tu marca también
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block bg-white text-boom-blue font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                Empecemos tu proyecto
            </a>
        </div>
    </section>

</x-frontend-layout>