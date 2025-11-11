<x-admin-layout>
    <x-slot name="header">Post Details</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $post->title }}</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">
                        Edit
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm transition">
                        Back
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">UUID</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $post->uuid }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Author</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->author->name ?? '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Category</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->category->name ?? '-' }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Slug</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $post->slug }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Excerpt</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $post->excerpt ?? '-' }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Content</label>
                    <div class="mt-1 text-sm text-gray-900 prose max-w-none">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Featured</label>
                        <p class="mt-1">
                            @if($post->featured)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Yes
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    No
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Status</label>
                        <p class="mt-1">
                            @if($post->published_at && $post->published_at <= now())
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Published
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Draft
                                </span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Views</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->views }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Reading Time</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->reading_time }} min</p>
                    </div>
                </div>

                <!-- SEO Section -->
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">SEO Meta Tags</h4>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Meta Title</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $post->meta_title ?? '-' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Meta Description</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $post->meta_description ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Media Section -->
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Featured Image</h4>
                    
                    @if($post->hasMedia('featured_image'))
                        <img src="{{ $post->getFirstMediaUrl('featured_image') }}" 
                             alt="{{ $post->title }}" 
                             class="w-full max-w-2xl h-64 object-cover rounded-lg border border-gray-200">
                    @else
                        <div class="w-full max-w-2xl h-64 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-sm">No featured image uploaded</span>
                        </div>
                    @endif
                </div>

                <!-- Dates Section -->
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Dates</h4>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Published At</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $post->published_at ? $post->published_at->format('M d, Y H:i') : 'Not published' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Created At</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $post->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Published At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->published_at ? $post->published_at->format('M d, Y H:i') : '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>