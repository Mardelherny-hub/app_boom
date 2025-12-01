<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- ============================================ --}}
    {{-- HEADER - Intro Blog --}}
    {{-- ============================================ --}}
    <section class="bg-boom-orange py-20 px-4 pt-32 mb-6">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Imagen IZQUIERDA --}}
                <div>
                    <div class="bg-white/20 aspect-[4/3] rounded-lg flex items-center justify-center text-white/60">
                        <span class="text-sm">Imagen pendiente</span>
                    </div>
                </div>
                
                {{-- Texto DERECHA --}}
                <div>
                    <h1 class="text-4xl md:text-5xl font-black text-white uppercase mb-6">
                        Nove<span class="text-boom-gray">da</span>des
                    </h1>
                    <p class="text-lg md:text-xl text-white leading-relaxed">
                        Presentamos las últimas noticias relacionadas al mundo del marketing y proyectos destacados de boom!
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- FILTROS POR CATEGORÍA --}}
    {{-- ============================================ --}}
    @if($categories->count() > 0)
    <section class="bg-[#FBFAFA] pb-8 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ route('blog.index') }}" 
                   class="px-6 py-2 rounded-full border-2 font-medium transition
                          {{ !isset($category) ? 'bg-boom-gray text-white border-boom-gray' : 'border-boom-gray text-boom-gray hover:bg-boom-gray hover:text-white' }}">
                    Todos
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('blog.category', $cat->slug) }}" 
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
    {{-- GRILLA DE POSTS --}}
    {{-- ============================================ --}}
    <section class="bg-[#FBFAFA] py-12 px-4">
        <div class="max-w-6xl mx-auto">
            @if($posts->count() > 0)
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group">
                        <article class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition h-full">
                            @if($post->getFirstMediaUrl('featured_image'))
                                <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                                     alt="{{ $post->title }}"
                                     class="w-full aspect-video object-cover">
                            @else
                                <div class="w-full aspect-video bg-boom-orange"></div>
                            @endif
                            
                            <div class="p-6">
                                @if($post->category)
                                <p class="text-xs uppercase tracking-wider text-boom-orange font-medium mb-2">
                                    {{ $post->category->name }}
                                </p>
                                @endif
                                
                                <h2 class="font-bold text-lg text-boom-gray group-hover:text-boom-orange transition mb-3">
                                    {{ $post->title }}
                                </h2>
                                
                                @if($post->excerpt)
                                <p class="text-sm text-gray-600 leading-relaxed mb-4">
                                    {{ Str::limit($post->excerpt, 100) }}
                                </p>
                                @endif
                                
                                <div class="flex items-center justify-between text-sm text-gray-400">
                                    @if($post->published_at)
                                    <span>{{ $post->published_at->format('d/m/Y') }}</span>
                                    @endif
                                    @if($post->author)
                                    <span>{{ $post->author->name }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </a>
                    @endforeach
                </div>

                {{-- Paginación --}}
                @if($posts->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $posts->links() }}
                </div>
                @endif
            @else
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <p class="text-gray-500 text-lg">Próximamente publicaremos novedades</p>
                </div>
            @endif
        </div>
    </section>

</x-frontend-layout>