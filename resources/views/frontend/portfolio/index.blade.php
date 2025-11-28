<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Header --}}
    <section class="pt-32 pb-16 bg-boom-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-7xl font-black text-white uppercase mb-4">
                PORT<span class="text-boom-orange">F</span>OLIO
            </h1>
            <p class="text-xl text-white opacity-80">Algunos de nuestros trabajos recientes</p>
        </div>
    </section>

    {{-- Categories Filter --}}
    @if($categories->count() > 0)
    <section class="py-6 bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ route('portfolio.index') }}" 
                   class="px-5 py-2 rounded-full font-medium text-sm uppercase tracking-wide transition {{ !isset($category) ? 'bg-boom-orange text-white' : 'bg-gray-100 text-boom-gray hover:bg-gray-200' }}">
                    Todos
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('portfolio.category', $cat->slug) }}" 
                   class="px-5 py-2 rounded-full font-medium text-sm uppercase tracking-wide transition {{ isset($category) && $category->id === $cat->id ? 'bg-boom-orange text-white' : 'bg-gray-100 text-boom-gray hover:bg-gray-200' }}">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Projects Grid --}}
    @php
    $projectColors = [
        'from-yellow-400 to-orange-400',
        'from-green-400 to-emerald-500',
        'from-purple-500 to-violet-600',
        'from-boom-blue to-cyan-500',
        'from-boom-pink to-rose-400',
        'from-red-500 to-orange-500',
        'from-indigo-500 to-purple-600',
        'from-teal-400 to-cyan-500',
        'from-amber-400 to-yellow-500',
        'from-fuchsia-500 to-pink-500',
        'from-lime-400 to-green-500',
        'from-sky-400 to-blue-500',
    ];
    @endphp

    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($projects->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($projects as $index => $project)
                    <a href="{{ route('portfolio.show', $project->slug) }}" 
                       class="relative aspect-square rounded-lg overflow-hidden group">
                        @if($project->getFirstMediaUrl('featured_image'))
                            <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-50 transition-opacity"></div>
                        @else
                            <div class="w-full h-full bg-gradient-to-br {{ $projectColors[$index % 12] }}"></div>
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition-opacity"></div>
                        @endif
                        <div class="absolute bottom-4 left-4 text-white">
                            @if($project->category)
                            <p class="text-xs uppercase tracking-wider opacity-80">{{ $project->category->name }}</p>
                            @endif
                            <h3 class="text-lg font-bold uppercase">{{ $project->title }}</h3>
                        </div>
                    </a>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($projects->hasPages())
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
                @endif
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500">No hay proyectos disponibles en este momento.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-boom-blue">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Querés un proyecto así?</h2>
            <p class="text-lg opacity-90 mb-8">
                Contanos tu idea y la hacemos realidad.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-blue transition-all">
                Comenzar proyecto
            </a>
        </div>
    </section>

</x-frontend-layout>