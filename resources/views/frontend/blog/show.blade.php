<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Header --}}
    <section class="pt-32 pb-16 bg-boom-gray">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('blog.index') }}" 
               class="inline-flex items-center text-white opacity-80 hover:opacity-100 mb-6 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver al blog
            </a>
            
            <div class="flex items-center text-sm text-white opacity-70 mb-4">
                @if($post->category)
                    <span class="text-boom-orange font-medium">{{ $post->category->name }}</span>
                    <span class="mx-2">•</span>
                @endif
                <time datetime="{{ $post->published_at->toDateString() }}">
                    {{ $post->published_at->format('d M, Y') }}
                </time>
                @if($post->author)
                    <span class="mx-2">•</span>
                    <span>Por {{ $post->author->name }}</span>
                @endif
            </div>
            
            <h1 class="text-3xl md:text-5xl font-black text-white mb-4">{{ $post->title }}</h1>
            
            @if($post->excerpt)
            <p class="text-xl text-white opacity-80">{{ $post->excerpt }}</p>
            @endif
        </div>
    </section>

    {{-- Featured Image --}}
    @if($post->getFirstMediaUrl('featured_image'))
    <section class="bg-gray-100">
        <div class="max-w-5xl mx-auto">
            <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                 alt="{{ $post->title }}"
                 class="w-full h-64 md:h-[400px] object-cover">
        </div>
    </section>
    @endif

    {{-- Content --}}
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none prose-headings:text-boom-gray prose-a:text-boom-orange prose-a:no-underline hover:prose-a:underline">
                {!! $post->content !!}
            </div>
            
            {{-- Share --}}
            <div class="mt-12 pt-8 border-t">
                <p class="text-sm text-gray-500 uppercase tracking-wider mb-4">Compartir</p>
                <div class="flex space-x-4">
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" 
                       target="_blank"
                       class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-boom-orange hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                       target="_blank"
                       class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-boom-orange hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" 
                       target="_blank"
                       class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-boom-orange hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Posts --}}
    @if($relatedPosts->count() > 0)
    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-boom-gray mb-8 text-center">Artículos relacionados</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedPosts as $related)
                <article class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group">
                    <a href="{{ route('blog.show', $related->slug) }}" class="block">
                        @if($related->getFirstMediaUrl('featured_image'))
                            <div class="overflow-hidden">
                                <img src="{{ $related->getFirstMediaUrl('featured_image') }}" 
                                     alt="{{ $related->title }}"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-boom-pink to-boom-blue"></div>
                        @endif
                    </a>
                    
                    <div class="p-6">
                        <time class="text-sm text-gray-500">{{ $related->published_at->format('d M, Y') }}</time>
                        
                        <h3 class="text-lg font-bold text-boom-gray mt-2 group-hover:text-boom-orange transition-colors">
                            <a href="{{ route('blog.show', $related->slug) }}">
                                {{ $related->title }}
                            </a>
                        </h3>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-20 bg-boom-blue">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Te gustó este artículo?</h2>
            <p class="text-lg opacity-90 mb-8">
                Contactanos y trabajemos juntos en tu próximo proyecto.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-blue transition-all">
                Contactanos
            </a>
        </div>
    </section>

</x-frontend-layout>