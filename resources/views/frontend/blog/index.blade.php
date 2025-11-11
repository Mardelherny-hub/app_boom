<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Hero Section Blog --}}
    <section class="relative bg-gradient-to-br from-boom-green via-boom-blue to-boom-pink py-20 px-4 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 right-10 w-40 h-40 bg-white rounded-full animate-float"></div>
            <div class="absolute bottom-20 left-20 w-32 h-32 bg-white rounded-full animate-floatReverse"></div>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto text-center text-white">
            <h1 class="text-5xl md:text-7xl font-black uppercase mb-6">
                Blog
            </h1>
            <p class="text-xl md:text-2xl opacity-90">
                Tendencias, consejos y novedades del mundo creativo
            </p>
        </div>
    </section>

    {{-- Posts Grid --}}
    <section class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
                        
                        {{-- Imagen destacada --}}
                        <div class="aspect-video overflow-hidden bg-gradient-to-br from-boom-blue to-boom-pink">
                            @if($post->getFirstMediaUrl('featured_image'))
                                <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        {{-- Contenido --}}
                        <div class="p-6">
                            {{-- Categoría --}}
                            @if($post->category)
                                <span class="inline-block bg-boom-orange/10 text-boom-orange text-xs font-semibold uppercase tracking-wider px-3 py-1 rounded-full mb-3">
                                    {{ $post->category->name }}
                                </span>
                            @endif
                            
                            {{-- Título --}}
                            <h2 class="text-xl font-bold text-boom-gray mb-3 group-hover:text-boom-orange transition-colors line-clamp-2">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            
                            {{-- Excerpt --}}
                            @if($post->excerpt)
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ $post->excerpt }}
                                </p>
                            @else
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>
                            @endif
                            
                            {{-- Meta info --}}
                            <div class="flex items-center justify-between text-sm text-gray-500 border-t border-gray-100 pt-4">
                                <div class="flex items-center space-x-4">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $post->published_at->format('d M Y') }}
                                    </span>
                                </div>
                                
                                <a href="{{ route('blog.show', $post->slug) }}" 
                                   class="text-boom-orange font-semibold hover:text-boom-gray transition-colors flex items-center">
                                    Leer más
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                
                {{-- Paginación --}}
                @if($posts->hasPages())
                    <div class="mt-12">
                        {{ $posts->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-20">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-500 mb-2">No hay artículos disponibles</h3>
                    <p class="text-gray-400">Pronto publicaremos nuevo contenido</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-boom-pink py-20 px-4">
        <div class="max-w-4xl mx-auto text-center text-boom-gray">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                ¿Querés estar al día?
            </h2>
            <p class="text-lg leading-relaxed mb-8 opacity-90">
                Suscribite para recibir las últimas tendencias y consejos creativos
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block bg-boom-gray text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-boom-orange transition-all transform hover:scale-105">
                Contactar
            </a>
        </div>
    </section>

</x-frontend-layout>