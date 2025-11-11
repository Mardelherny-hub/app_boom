<x-frontend-layout>

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>
        
    {{-- Header --}}
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($project->category)
            <a href="{{ route('portfolio.category', $project->category->slug) }}" 
               class="inline-block text-sm font-medium text-gray-300 hover:text-white mb-4">
                ← {{ $project->category->name }}
            </a>
            @endif
            
            <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $project->title }}</h1>
            
            <div class="flex flex-wrap items-center gap-4 text-gray-300">
                @if($project->client)
                <div>
                    <span class="text-sm text-gray-400">Client:</span>
                    <span class="font-medium">{{ $project->client }}</span>
                </div>
                @endif
                
                @if($project->project_date)
                <span>•</span>
                <div>
                    <span class="text-sm text-gray-400">Date:</span>
                    <span class="font-medium">{{ $project->project_date->format('F Y') }}</span>
                </div>
                @endif
                
                <span>•</span>
                <div>
                    <span class="text-sm text-gray-400">Views:</span>
                    <span class="font-medium">{{ number_format($project->views) }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if($project->getFirstMediaUrl('featured_image'))
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                 alt="{{ $project->title }}"
                 class="w-full rounded-lg shadow-lg">
        </div>
    </section>
    @endif

    {{-- Content --}}
    <article class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($project->description)
            <div class="text-xl text-gray-600 mb-8 pb-8 border-b border-gray-200">
                {{ $project->description }}
            </div>
            @endif

            @if($project->content)
            <div class="prose prose-lg max-w-none">
                {!! $project->content !!}
            </div>
            @endif

        </div>
    </article>

    {{-- Gallery --}}
    @php
        $galleryImages = $project->getMedia('gallery');
    @endphp
    @if($galleryImages->count() > 0)
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Project Gallery</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($galleryImages as $image)
                <a href="{{ $image->getUrl() }}" 
                   data-lightbox="gallery" 
                   class="block overflow-hidden rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="{{ $image->getUrl() }}" 
                         alt="Gallery image"
                         class="w-full h-64 object-cover hover:scale-110 transition-transform duration-300">
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Related Projects --}}
    @if($relatedProjects->count() > 0)
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Projects</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedProjects as $relatedProject)
                <article class="group bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                    @if($relatedProject->getFirstMediaUrl('featured_image'))
                    <a href="{{ route('portfolio.show', $relatedProject->slug) }}">
                        <img src="{{ $relatedProject->getFirstMediaUrl('featured_image') }}" 
                             alt="{{ $relatedProject->title }}"
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </a>
                    @endif
                    
                    <div class="p-6">
                        @if($relatedProject->category)
                        <span class="text-sm text-gray-500 font-medium">{{ $relatedProject->category->name }}</span>
                        @endif
                        
                        <h3 class="text-lg font-bold text-gray-900 mt-2 mb-2">
                            <a href="{{ route('portfolio.show', $relatedProject->slug) }}" 
                               class="hover:text-gray-700 transition">
                                {{ $relatedProject->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm">{{ Str::limit($relatedProject->description, 80) }}</p>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('portfolio.index') }}" 
                   class="inline-block px-6 py-3 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
                    View All Projects
                </a>
            </div>
        </div>
    </section>
    @endif

</x-frontend-layout>