<x-frontend-layout>

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Header --}}
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Portfolio</h1>
            <p class="text-xl text-gray-300">Explore our latest projects and success stories</p>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Categories Filter --}}
            @if($categories->count() > 0)
            <div class="mb-8 flex flex-wrap gap-3">
                <a href="{{ route('portfolio.index') }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ !isset($category) ? 'bg-gray-900 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                    All Projects
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('portfolio.category', $cat->slug) }}" 
                   class="px-4 py-2 rounded-lg font-medium transition {{ isset($category) && $category->id === $cat->id ? 'bg-gray-900 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                    {{ $cat->name }} ({{ $cat->published_projects_count }})
                </a>
                @endforeach
            </div>
            @endif

            {{-- Projects Grid --}}
            @if($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $project)
                    <article class="group bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                        @if($project->getFirstMediaUrl('featured_image'))
                        <a href="{{ route('portfolio.show', $project->slug) }}" class="block overflow-hidden">
                            <x-lazy-image 
                                :src="$project->getFirstMediaUrl('featured_image')" 
                                :alt="$project->title"
                                class="w-full h-64 object-cover rounded-lg"
                            />
                        </a>
                        @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No image</span>
                        </div>
                        @endif
                        
                        <div class="p-6">
                            @if($project->category)
                            <span class="inline-block text-sm font-medium text-gray-500 mb-2">
                                {{ $project->category->name }}
                            </span>
                            @endif
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-gray-700 transition">
                                <a href="{{ route('portfolio.show', $project->slug) }}">
                                    {{ $project->title }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                            
                            <div class="flex items-center justify-between text-sm">
                                @if($project->client)
                                <span class="text-gray-500">Client: {{ $project->client }}</span>
                                @endif
                                
                                @if($project->project_date)
                                <span class="text-gray-500">{{ $project->project_date->format('Y') }}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <p class="text-gray-500">No projects found.</p>
                </div>
            @endif

        </div>
    </section>

</x-frontend-layout>