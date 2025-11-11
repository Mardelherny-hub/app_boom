<x-admin-layout>
    <x-slot name="header">Project Details</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $project->title }}</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">
                        Edit
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm transition">
                        Back
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">UUID</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $project->uuid }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Category</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $project->category->name ?? '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Client</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $project->client ?? '-' }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Slug</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $project->slug }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Description</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $project->description ?? '-' }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Content</label>
                    <div class="mt-1 text-sm text-gray-900 prose max-w-none">
                        {!! nl2br(e($project->content)) !!}
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Project Date</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $project->project_date ? $project->project_date->format('M d, Y') : '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Views</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $project->views }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Featured</label>
                        <p class="mt-1">
                            @if($project->featured)
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
                            @if($project->published_at && $project->published_at <= now())
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
                        <label class="block text-sm font-medium text-gray-500">Published At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $project->published_at ? $project->published_at->format('M d, Y H:i') : '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $project->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Media Section -->
            <div class="border-t border-gray-200 pt-4 mt-4">
                <h4 class="text-sm font-semibold text-gray-900 mb-3">Media</h4>
                
                <!-- Featured Image -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Featured Image</label>
                    @if($project->hasMedia('featured_image'))
                        <img src="{{ $project->getFirstMediaUrl('featured_image') }}" 
                            alt="{{ $project->title }}" 
                            class="w-full max-w-2xl h-64 object-cover rounded-lg border border-gray-200">
                    @else
                        <div class="w-full max-w-2xl h-64 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-sm">No featured image uploaded</span>
                        </div>
                    @endif
                </div>

                <!-- Gallery -->
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-2">
                        Gallery 
                        @if($project->hasMedia('gallery'))
                            <span class="text-xs text-gray-400">({{ $project->getMedia('gallery')->count() }} images)</span>
                        @endif
                    </label>
                    
                    @if($project->hasMedia('gallery'))
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($project->getMedia('gallery') as $media)
                                <div class="relative group">
                                    <img src="{{ $media->getUrl() }}" 
                                        alt="Gallery image" 
                                        class="w-full h-32 object-cover rounded-lg border border-gray-200">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all rounded-lg flex items-center justify-center">
                                        <a href="{{ $media->getUrl() }}" 
                                        target="_blank" 
                                        class="opacity-0 group-hover:opacity-100 text-white text-sm px-3 py-1 bg-indigo-600 rounded">
                                            View Full
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="w-full h-32 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-sm">No gallery images uploaded</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>