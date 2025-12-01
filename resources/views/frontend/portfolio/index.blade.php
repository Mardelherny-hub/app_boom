<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- ============================================ --}}
    {{-- HEADER --}}
    {{-- ============================================ --}}
    <section class="bg-boom-blue py-20 px-4 pt-32">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Texto IZQUIERDA --}}
                <div>
                    <h1 class="text-5xl md:text-7xl font-black text-white uppercase leading-none mb-6">
                        PORT<br>FO<span class="text-boom-orange">L</span>IO
                    </h1>
                </div>
                
                {{-- Texto DERECHA --}}
                <div class="text-white">
                    <p class="text-lg md:text-xl leading-relaxed">
                        Estos son algunos de los proyectos que desarrollamos en los últimos años para marcas de diferentes rubros y lugares del país.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- FILTROS POR CATEGORÍA --}}
    {{-- ============================================ --}}
    @if($categories->count() > 0)
    <section class="bg-[#FBFAFA] py-8 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ route('portfolio.index') }}" 
                   class="px-6 py-2 rounded-full border-2 font-medium transition
                          {{ !isset($category) ? 'bg-boom-gray text-white border-boom-gray' : 'border-boom-gray text-boom-gray hover:bg-boom-gray hover:text-white' }}">
                    Todos
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('portfolio.category', $cat->slug) }}" 
                   class="px-6 py-2 rounded-full border-2 font-medium transition
                          {{ isset($category) && $category->id === $cat->id ? 'bg-boom-gray text-white border-boom-gray' : 'border-boom-gray text-boom-gray hover:bg-boom-gray hover:text-white' }}">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ============================================ --}}
    {{-- GRILLA DE PROYECTOS --}}
    {{-- ============================================ --}}
    <section class="bg-[#FBFAFA] py-12 px-4">
        <div class="max-w-6xl mx-auto">
            @php
            $projectColors = [
                'bg-boom-orange',
                'bg-boom-blue', 
                'bg-boom-green',
                'bg-boom-pink',
                'bg-boom-gray',
                'bg-yellow-400',
            ];
            @endphp
            
            @if($projects->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($projects as $index => $project)
                    <a href="{{ route('portfolio.show', $project->slug) }}" 
                       class="relative aspect-square rounded-lg overflow-hidden group">
                        @if($project->getFirstMediaUrl('featured_image'))
                            <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-40 transition-opacity"></div>
                        @else
                            <div class="w-full h-full {{ $projectColors[$index % 6] }}"></div>
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity"></div>
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

                {{-- Paginación --}}
                @if($projects->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $projects->links() }}
                </div>
                @endif
            @else
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <p class="text-gray-500 text-lg">Próximamente mostraremos nuestros proyectos</p>
                </div>
            @endif
        </div>
    </section>

</x-frontend-layout>