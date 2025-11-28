<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Header --}}
    <section class="pt-32 pb-16 bg-boom-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-7xl font-black text-white uppercase mb-4">Blog</h1>
            <p class="text-xl text-white opacity-80">Ideas, tendencias y consejos de diseño</p>
        </div>
    </section>

    {{-- Categories Filter --}}
    @if($categories->count() > 0)
    <section class="py-6 bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ route('blog.index') }}" 
                   class="px-5 py-2 rounded-full font-medium text-sm uppercase tracking-wide transition {{ !isset($category) ? 'bg-boom-orange text-white' : 'bg-gray-100 text-boom-gray hover:bg-gray-200' }}">
                    Todos
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('blog.category', $cat->slug) }}" 
                   class="px-5 py-2 rounded-full font-medium text-sm uppercase tracking-wide transition {{ isset($category) && $category->id === $cat->id ? 'bg-boom-orange text-white' : 'bg-gray-100 text-boom-gray hover:bg-gray-200' }}">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Posts Grid --}}
    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                    <article class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group">
                        <a href="{{ route('blog.show', $post->slug) }}" class="block">
                            @if($post->getFirstMediaUrl('featured_image'))
                                <div class="overflow-hidden">
                                    <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                                         alt="{{ $post->title }}"
                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-boom-pink to-boom-blue"></div>
                            @endif
                        </a>
                        
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                @if($post->category)
                                    <span class="text-boom-orange font-medium">{{ $post->category->name }}</span>
                                    <span class="mx-2">•</span>
                                @endif
                                <time datetime="{{ $post->published_at->toDateString() }}">
                                    {{ $post->published_at->format('d M, Y') }}
                                </time>
                            </div>
                            
                            <h2 class="text-xl font-bold text-boom-gray mb-3 group-hover:text-boom-orange transition-colors">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            
                            @if($post->excerpt)
                            <p class="text-gray-600 mb-4">{{ Str::limit($post->excerpt, 100) }}</p>
                            @endif
                            
                            <a href="{{ route('blog.show', $post->slug) }}" 
                               class="inline-flex items-center text-boom-orange font-semibold text-sm hover:underline">
                                Leer más
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($posts->hasPages())
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
                @endif
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500">No hay artículos disponibles en este momento.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-boom-blue">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Tenés un proyecto en mente?</h2>
            <p class="text-lg opacity-90 mb-8">
                Contactanos y hagamos algo increíble juntos.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-blue transition-all">
                Contactanos
            </a>
        </div>
    </section>

</x-frontend-layout>