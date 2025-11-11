<x-frontend-layout>

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Header --}}
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Blog</h1>
            <p class="text-xl text-gray-300">Insights, tips, and stories from our team</p>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- Main Content --}}
                <div class="lg:w-2/3">
                    @if($posts->count() > 0)
                        <div class="space-y-8">
                            @foreach($posts as $post)
                            <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                                <div class="md:flex">
                                    @if($post->getFirstMediaUrl('featured_image'))
                                    <div class="md:w-1/3">
                                        <a href="{{ route('blog.show', $post->slug) }}">
                                            <x-lazy-image 
                                                :src="$post->getFirstMediaUrl('featured_image')" 
                                                :alt="$post->title"
                                                class="w-full h-48 object-cover rounded-lg"
                                            />
                                        </a>
                                    </div>
                                    @endif
                                    
                                    <div class="p-6 {{ $post->getFirstMediaUrl('featured_image') ? 'md:w-2/3' : 'w-full' }}">
                                        <div class="flex items-center text-sm text-gray-500 mb-3">
                                            @if($post->category)
                                                <a href="{{ route('blog.category', $post->category->slug) }}" 
                                                   class="font-medium text-gray-700 hover:text-gray-900">
                                                    {{ $post->category->name }}
                                                </a>
                                                <span class="mx-2">•</span>
                                            @endif
                                            <time datetime="{{ $post->published_at->toDateString() }}">
                                                {{ $post->published_at->format('M d, Y') }}
                                            </time>
                                            <span class="mx-2">•</span>
                                            <span>{{ $post->reading_time }} min read</span>
                                        </div>
                                        
                                        <h2 class="text-2xl font-bold text-gray-900 mb-3">
                                            <a href="{{ route('blog.show', $post->slug) }}" 
                                               class="hover:text-gray-700 transition">
                                                {{ $post->title }}
                                            </a>
                                        </h2>
                                        
                                        <p class="text-gray-600 mb-4">{{ Str::limit($post->excerpt, 200) }}</p>
                                        
                                        <div class="flex items-center justify-between">
                                            <a href="{{ route('blog.show', $post->slug) }}" 
                                               class="text-gray-900 font-semibold hover:text-gray-700 transition">
                                                Read more →
                                            </a>
                                            
                                            @if($post->author)
                                            <div class="flex items-center text-sm text-gray-500">
                                                <span>By {{ $post->author->name }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-8">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                            <p class="text-gray-500">No posts found.</p>
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <aside class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-20">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Categories</h3>
                        
                        @if($categories->count() > 0)
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('blog.index') }}" 
                                   class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-gray-50 transition {{ !isset($category) ? 'bg-gray-100 font-semibold' : '' }}">
                                    <span>All Posts</span>
                                    <span class="text-sm text-gray-500">{{ $posts->total() }}</span>
                                </a>
                            </li>
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('blog.category', $cat->slug) }}" 
                                   class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-gray-50 transition {{ isset($category) && $category->id === $cat->id ? 'bg-gray-100 font-semibold' : '' }}">
                                    <span>{{ $cat->name }}</span>
                                    <span class="text-sm text-gray-500">{{ $cat->published_posts_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p class="text-gray-500 text-sm">No categories yet.</p>
                        @endif
                    </div>
                </aside>

            </div>
        </div>
    </section>

</x-frontend-layout>