<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Hero Section Artículo --}}
    <section class="relative bg-boom-gray text-white py-20 px-4">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('blog.index') }}" 
               class="inline-flex items-center text-boom-orange hover:text-white mb-6 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver al blog
            </a>
            
            @if($post->category)
                <a href="{{ route('blog.category', $post->category->slug) }}"
                   class="inline-block bg-boom-orange/20 text-boom-orange px-4 py-1 rounded-full text-sm font-semibold uppercase tracking-wider mb-4 hover:bg-boom-orange hover:text-white transition-colors">
                    {{ $post->category->name }}
                </a>
            @endif
            
            <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight">
                {{ $post->title }}
            </h1>
            
            @if($post->excerpt)
                <p class="text-xl opacity-90 leading-relaxed mb-6">
                    {{ $post->excerpt }}
                </p>
            @endif
            
            <div class="flex flex-wrap items-center gap-4 text-sm opacity-80">
                @if($post->author)
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>{{ $post->author->name }}</span>
                    </div>
                @endif
                
                <span>•</span>
                
                <time datetime="{{ $post->published_at->toDateString() }}" class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{ $post->published_at->format('d M Y') }}
                </time>
                
                @if($post->reading_time)
                    <span>•</span>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $post->reading_time }} min lectura
                    </span>
                @endif
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if($post->getFirstMediaUrl('featured_image'))
    <section class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4">
            <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                 alt="{{ $post->title }}"
                 class="w-full rounded-2xl shadow-2xl">
        </div>
    </section>
    @endif

    {{-- Contenido del Artículo --}}
    <article class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-4">
            <div class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-boom-gray prose-a:text-boom-orange prose-a:no-underline hover:prose-a:text-boom-gray prose-strong:text-boom-gray prose-img:rounded-2xl prose-img:shadow-lg">
                {!! $post->content !!}
            </div>
        </div>
    </article>

    {{-- Compartir en Redes --}}
    <section class="py-12 bg-gray-50 border-y border-gray-200">
        <div class="max-w-3xl mx-auto px-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-boom-gray">Compartir artículo</h3>
                <div class="flex items-center space-x-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" 
                       target="_blank"
                       class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" 
                       target="_blank"
                       class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center hover:bg-gray-800 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                    
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $post->slug)) }}&title={{ urlencode($post->title) }}" 
                       target="_blank"
                       class="w-10 h-10 rounded-full bg-blue-700 text-white flex items-center justify-center hover:bg-blue-800 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Artículos Relacionados --}}
    @if($relatedPosts->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-black uppercase text-boom-gray mb-12 text-center">
                Artículos Relacionados
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedPosts as $relatedPost)
                <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
                    <div class="aspect-video overflow-hidden bg-gradient-to-br from-boom-blue to-boom-pink">
                        @if($relatedPost->getFirstMediaUrl('featured_image'))
                            <img src="{{ $relatedPost->getFirstMediaUrl('featured_image') }}" 
                                 alt="{{ $relatedPost->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif
                    </div>
                    
                    <div class="p-6">
                        @if($relatedPost->category)
                            <span class="inline-block bg-boom-orange/10 text-boom-orange text-xs font-semibold uppercase tracking-wider px-3 py-1 rounded-full mb-3">
                                {{ $relatedPost->category->name }}
                            </span>
                        @endif
                        
                        <h3 class="text-lg font-bold text-boom-gray mb-2 group-hover:text-boom-orange transition-colors line-clamp-2">
                            <a href="{{ route('blog.show', $relatedPost->slug) }}">
                                {{ $relatedPost->title }}
                            </a>
                        </h3>
                        
                        <p class="text-sm text-gray-500">
                            {{ $relatedPost->published_at->format('d M Y') }}
                        </p>
                    </div>
                </article>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}" 
                   class="inline-block bg-boom-orange text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-opacity-90 transition-all transform hover:scale-105">
                    Ver todos los artículos
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="bg-boom-green py-20 px-4">
        <div class="max-w-4xl mx-auto text-center text-boom-gray">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                ¿Te gustó este artículo?
            </h2>
            <p class="text-xl leading-relaxed mb-8 opacity-90">
                Hablemos sobre cómo podemos ayudarte con tu proyecto
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block bg-boom-gray text-white font-bold py-4 px-8 rounded-full uppercase text-sm tracking-wider hover:bg-boom-orange transition-all transform hover:scale-105">
                Contactar
            </a>
        </div>
    </section>

</x-frontend-layout>