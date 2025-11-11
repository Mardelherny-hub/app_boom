<x-frontend-layout>

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Header --}}
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($post->category)
            <a href="{{ route('blog.category', $post->category->slug) }}" 
               class="inline-block text-sm font-medium text-gray-300 hover:text-white mb-4">
                ← {{ $post->category->name }}
            </a>
            @endif
            
            <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $post->title }}</h1>
            
            <div class="flex items-center text-gray-300 space-x-4">
                @if($post->author)
                <div class="flex items-center">
                    <span>By {{ $post->author->name }}</span>
                </div>
                @endif
                <span>•</span>
                <time datetime="{{ $post->published_at->toDateString() }}">
                    {{ $post->published_at->format('M d, Y') }}
                </time>
                <span>•</span>
                <span>{{ $post->reading_time }} min read</span>
                <span>•</span>
                <span>{{ number_format($post->views) }} views</span>
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if($post->getFirstMediaUrl('featured_image'))
    <section class="py-8 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                 alt="{{ $post->title }}"
                 class="w-full rounded-lg shadow-lg">
        </div>
    </section>
    @endif

    {{-- Content --}}
    <article class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($post->excerpt)
            <div class="text-xl text-gray-600 mb-8 pb-8 border-b border-gray-200">
                {{ $post->excerpt }}
            </div>
            @endif

            <div class="prose prose-lg max-w-none">
                {!! $post->content !!}
            </div>

            {{-- Share Section --}}
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Share this post</h3>
                <div class="flex space-x-4">
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" 
                       target="_blank"
                       class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Twitter
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" 
                       target="_blank"
                       class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">
                        Facebook
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}" 
                       target="_blank"
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        LinkedIn
                    </a>
                </div>
            </div>

            {{-- Author Info --}}
            @if($post->author)
            <div class="mt-12 p-6 bg-gray-50 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">About the Author</h3>
                <p class="text-gray-700 font-medium">{{ $post->author->name }}</p>
                <p class="text-gray-600 text-sm">{{ $post->author->email }}</p>
            </div>
            @endif

        </div>
    </article>

    {{-- Related Posts --}}
    @if($relatedPosts->count() > 0)
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Posts</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedPosts as $relatedPost)
                <article class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                    @if($relatedPost->getFirstMediaUrl('featured_image'))
                    <a href="{{ route('blog.show', $relatedPost->slug) }}">
                        <img src="{{ $relatedPost->getFirstMediaUrl('featured_image') }}" 
                             alt="{{ $relatedPost->title }}"
                             class="w-full h-48 object-cover">
                    </a>
                    @endif
                    
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">
                            {{ $relatedPost->published_at->format('M d, Y') }}
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            <a href="{{ route('blog.show', $relatedPost->slug) }}" 
                               class="hover:text-gray-700 transition">
                                {{ $relatedPost->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm">{{ Str::limit($relatedPost->excerpt, 100) }}</p>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('blog.index') }}" 
                   class="inline-block px-6 py-3 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
                    View All Posts
                </a>
            </div>
        </div>
    </section>
    @endif

</x-frontend-layout>