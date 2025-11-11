<x-admin-layout>
    <x-slot name="header">Page Details</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $page->title }}</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">
                        Edit
                    </a>
                    <a href="{{ route('admin.pages.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm transition">
                        Back
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">UUID</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $page->uuid }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Slug</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $page->slug }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Template</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $page->template }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Description</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $page->description ?? '-' }}</p>
                </div>

                @if($page->blocks)
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Blocks</label>
                        <div class="mt-1 bg-gray-50 rounded-lg p-4">
                            <pre class="text-xs text-gray-700 overflow-auto">{{ json_encode($page->blocks, JSON_PRETTY_PRINT) }}</pre>
                        </div>
                    </div>
                @endif

                <div>
                    <label class="block text-sm font-medium text-gray-500">Status</label>
                    <p class="mt-1">
                        @if($page->published_at && $page->published_at <= now())
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

                <!-- SEO Section -->
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">SEO Meta Tags</h4>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Meta Title</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $page->meta_title ?? '-' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500">Meta Description</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $page->meta_description ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Published At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $page->published_at ? $page->published_at->format('M d, Y H:i') : '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $page->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>