<x-admin-layout>
    <x-slot name="header">Service Details</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $service->title }}</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">
                        Edit
                    </a>
                    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm transition">
                        Back
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">UUID</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $service->uuid }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Slug</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $service->slug }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Description</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $service->description ?? '-' }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Content</label>
                    <div class="mt-1 text-sm text-gray-900 prose max-w-none">
                        {!! nl2br(e($service->content)) !!}
                    </div>
                </div>

               <!-- Media Section -->
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Media</h4>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Featured Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-2">Featured Image</label>
                            @if($service->hasMedia('image'))
                                <img src="{{ $service->getFirstMediaUrl('image') }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-full h-48 object-cover rounded-lg border border-gray-200">
                            @else
                                <div class="w-full h-48 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">No image uploaded</span>
                                </div>
                            @endif
                        </div>

                        <!-- Icon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-2">Icon</label>
                            @if($service->hasMedia('icon'))
                                <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                                     alt="{{ $service->title }} icon" 
                                     class="w-32 h-32 object-contain rounded-lg border border-gray-200 bg-white p-2">
                            @else
                                <div class="w-32 h-32 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">No icon</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Other Details -->
                <div class="grid grid-cols-2 gap-4 border-t border-gray-200 pt-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Order</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $service->order }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Featured</label>
                        <p class="mt-1">
                            @if($service->featured)
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
                            @if($service->published_at && $service->published_at <= now())
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
                        <p class="mt-1 text-sm text-gray-900">{{ $service->published_at ? $service->published_at->format('M d, Y H:i') : '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $service->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>