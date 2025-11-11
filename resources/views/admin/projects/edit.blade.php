<x-admin-layout>
    <x-slot name="header">Edit Project</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.projects.update', $project->id) }}"" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-admin.form-select
                    label="Category"
                    name="category_id"
                    required
                >
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-admin.form-select>

                <x-admin.form-input
                    label="Title"
                    name="title"
                    :value="$project->title"
                    required
                />

                <x-admin.form-input
                    label="Slug"
                    name="slug"
                    :value="$project->slug"
                />

                <x-admin.form-input
                    label="Client"
                    name="client"
                    :value="$project->client"
                />

                <x-admin.form-textarea
                    label="Description"
                    name="description"
                    :value="$project->description"
                    rows="3"
                />

                <x-admin.form-textarea
                    label="Content"
                    name="content"
                    :value="$project->content"
                    rows="10"
                />

                <x-admin.file-upload
                    label="Featured Image"
                    name="featured_image"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                    :current="$project->getFirstMediaUrl('featured_image')"
                />

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Gallery Images
                    </label>
                    
                    @if($project->hasMedia('gallery'))
                        <div class="grid grid-cols-4 gap-4 mb-3">
                            @foreach($project->getMedia('gallery') as $media)
                                <div class="relative">
                                    <img src="{{ $media->getUrl() }}" alt="" class="h-24 w-full object-cover rounded border">
                                    <button type="button" onclick="if(confirm('Delete this image?')) document.getElementById('delete-media-{{ $media->id }}').submit();" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    <form id="delete-media-{{ $media->id }}" action="{{ route('admin.projects.media.delete', [$project->id, $media->id]) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
                    <input 
                        type="file" 
                        name="gallery[]" 
                        multiple
                        accept="image/jpeg,image/png,image/jpg,image/webp"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                    >
                    <p class="mt-1 text-xs text-gray-500">Add more images to gallery</p>
                    @error('gallery')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <x-admin.form-input
                    label="Project Date"
                    name="project_date"
                    type="date"
                    :value="$project->project_date ? $project->project_date->format('Y-m-d') : ''"
                />

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="featured" value="1" {{ $project->featured ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">Featured Project</span>
                    </label>
                </div>

                <x-admin.form-input
                    label="Published At"
                    name="published_at"
                    type="datetime-local"
                    :value="$project->published_at ? $project->published_at->format('Y-m-d\TH:i') : ''"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Update Project
                    </x-admin.button>

                    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>

                    
                </div>
            </form>

            <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" onsubmit="return confirm('Are you sure?')" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <x-admin.button type="submit" variant="danger">
                            Delete Project
                        </x-admin.button>
                    </form>
        </div>
    </div>
</x-admin-layout>