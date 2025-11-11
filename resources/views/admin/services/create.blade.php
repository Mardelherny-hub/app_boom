<x-admin-layout>
    <x-slot name="header">Create Service</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                @csrf

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
                    name="image"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                />

                <x-admin.file-upload
                    label="Icon"
                    name="icon_file"
                    accept="image/jpeg,image/png,image/jpg,image/svg+xml,image/webp"
                />

                <x-admin.form-input
                    label="Icon Class"
                    name="icon"
                    placeholder="e.g., fa-cog, heroicon-o-cog"
                />

                <x-admin.form-input
                    label="Order"
                    name="order"
                    type="number"
                    value="0"
                />

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="featured" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">Featured Service</span>
                    </label>
                </div>

                <x-admin.form-input
                    label="Published At"
                    name="published_at"
                    type="datetime-local"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Create Service
                    </x-admin.button>

                    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>