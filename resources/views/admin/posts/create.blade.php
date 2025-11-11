<x-admin-layout>
    <x-slot name="header">Create Post</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
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
                    label="Excerpt"
                    name="excerpt"
                    rows="3"
                    placeholder="Short description for listings"
                />

                <x-admin.trix-editor
                    label="Content"
                    name="content"
                />

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="featured" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">Featured Post</span>
                    </label>
                </div>

                <x-admin.file-upload
                    label="Featured Image"
                    name="featured_image"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                />

                <!-- SEO Section -->
                <div class="border-t border-gray-200 pt-4 mt-6">
                    <h3 class="text-sm font-semibold text-gray-900 mb-4">SEO Meta Tags</h3>
                    
                    <x-admin.form-input
                        label="Meta Title"
                        name="meta_title"
                        placeholder="Leave blank to use post title"
                    />

                    <x-admin.form-textarea
                        label="Meta Description"
                        name="meta_description"
                        rows="2"
                        placeholder="Leave blank to use excerpt"
                    />
                </div>

                <x-admin.form-input
                    label="Published At"
                    name="published_at"
                    type="datetime-local"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Create Post
                    </x-admin.button>

                    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>