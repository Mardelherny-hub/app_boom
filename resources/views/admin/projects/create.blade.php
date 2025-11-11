<x-admin-layout>
    <x-slot name="header">Create Project</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                @csrf

                <x-admin.form-select
                    label="Category"
                    name="category_id"
                    required
                >
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-admin.form-select>

                <x-admin.form-input
                    label="Title"
                    name="title"
                    required
                />

                <x-admin.form-input
                    label="Slug"
                    name="slug"
                    placeholder="Auto-generated from title"
                />

                <x-admin.form-textarea
                    label="Description"
                    name="description"
                    rows="3"
                />

                <x-admin.form-textarea
                    label="Content"
                    name="content"
                    rows="10"
                />

                <x-admin.file-upload
                    label="Featured Image"
                    name="featured_image"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                />

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Gallery Images
                    </label>
                    <input 
                        type="file" 
                        name="gallery[]" 
                        multiple
                        accept="image/jpeg,image/png,image/jpg,image/webp"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                    >
                    <p class="mt-1 text-xs text-gray-500">You can select multiple images</p>
                    @error('gallery')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <x-admin.form-input
                    label="Client"
                    name="client"
                />

                <x-admin.form-input
                    label="Project Date"
                    name="project_date"
                    type="date"
                />

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="featured" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">Featured Project</span>
                    </label>
                </div>

                <x-admin.form-input
                    label="Published At"
                    name="published_at"
                    type="datetime-local"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Create Project
                    </x-admin.button>

                    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>