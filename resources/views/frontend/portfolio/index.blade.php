<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Hero Section Portfolio --}}
    <section class="relative bg-gradient-to-br from-boom-pink via-boom-blue to-boom-green py-20 px-4 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-40 h-40 bg-white rounded-full animate-float"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-white rounded-full animate-floatReverse"></div>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto text-center text-white">
            <h1 class="text-5xl md:text-7xl font-black uppercase mb-6">
                Portfolio
            </h1>
            <p class="text-xl md:text-2xl opacity-90">
                Proyectos que marcaron la diferencia
            </p>
        </div>
    </section>

    {{-- Portfolio Grid --}}
    <section class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            
            @if($projects->count() > 0)
                {{-- Grid masonry style --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($projects as $index => $project)
                        @php
                            // Colores alternados para el grid
                            $gradients = [
                                'from-purple-500 to-pink-500',
                                'from-blue-500 to-cyan-500',
                                'from-orange-500 to-red-500',
                                'from-green-500 to-teal-500',
                                'from-indigo-500 to-purple-500',
                                'from-yellow-400 to-orange-500',
                                'from-boom-orange to-red-500',
                                'from-boom-blue to-indigo-500',
                                'from-boom-pink to-purple-500',
                            ];
                            $gradient = $gradients[$index % count($gradients)];
                        @endphp
                        
                        <a href="{{ route('portfolio.show', $project->slug) }}" 
                           class="relative aspect-square bg-gradient-to-br {{ $gradient }} rounded-2xl overflow-hidden group cursor-pointer hover:scale-105 transition-transform duration-300 shadow-lg hover:shadow-2xl">
                            
                            @if($project->getFirstMediaUrl('featured'))
                                <img src="{{ $project->getFirstMediaUrl('featured') }}" 
                                     alt="{{ $project->title }}"
                                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                            
                            <div class="absolute inset-0 p-6 flex flex-col justify-end text-white">
                                @if($project->category)
                                    <p class="text-xs uppercase tracking-wider font-semibold mb-2 text-boom-green">
                                        {{ $project->category->name }}
                                    </p>
                                @endif
                                <h3 class="text-2xl font-bold uppercase mb-2 group-hover:text-boom-orange transition-colors">
                                    {{ $project->title }}
                                </h3>
                                <p class="text-sm opacity-90 line-clamp-2">
                                    {{ Str::limit($project->description, 80) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-500 mb-2">No hay proyectos disponibles</h3>
                    <p class="text-gray-400">Pronto agregaremos nuevos trabajos</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-boom-gray py-20 px-4">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                ¿Tenés un proyecto en mente?
            </h2>
            <p class="text-lg leading-relaxed mb-8 opacity-90">
                Convertimos ideas en proyectos exitosos que generan impacto real
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block bg-boom-orange text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                Hablemos de tu proyecto
            </a>
        </div>
    </section>

</x-frontend-layout>