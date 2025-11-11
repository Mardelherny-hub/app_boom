<x-admin-layout>
    <x-slot name="header">Edit Service</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
                    @csrf
                @method('PUT')

                <x-admin.form-input
                    label="Title"
                    name="title"
                    :value="$service->title"
                    required
                />

                <x-admin.form-input
                    label="Slug"
                    name="slug"
                    :value="$service->slug"
                />

                <x-admin.form-textarea
                    label="Description"
                    name="description"
                    :value="$service->description"
                    rows="3"
                />

                <x-admin.form-textarea
                    label="Content"
                    name="content"
                    :value="$service->content"
                    rows="10"
                />

                 <x-admin.file-upload
                    label="Featured Image"
                    name="image"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                    :current="$service->getFirstMediaUrl('image')"
                />

                <x-admin.file-upload
                    label="Icon"
                    name="icon_file"
                    accept="image/jpeg,image/png,image/jpg,image/svg+xml,image/webp"
                    :current="$service->getFirstMediaUrl('icon')"
                />

                <x-admin.form-input
                    label="Icon"
                    name="icon"
                    :value="$service->icon"
                    placeholder="e.g., fa-cog, heroicon-o-cog"
                />

                <x-admin.form-input
                    label="Order"
                    name="order"
                    type="number"
                    :value="$service->order"
                />

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="featured" value="1" {{ $service->featured ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">Featured Service</span>
                    </label>
                </div>

                <x-admin.form-input
                    label="Published At"
                    name="published_at"
                    type="datetime-local"
                    :value="$service->published_at ? $service->published_at->format('Y-m-d\TH:i') : ''"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Update Service
                    </x-admin.button>

                    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>

                    
                </div>
            </form>
            <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" onsubmit="return confirm('Are you sure you want to delete this service?')" class="ml-auto">
                        @csrf
                        @method('DELETE')
                        <x-admin.button type="submit" variant="danger">
                            Delete Service
                        </x-admin.button>
                    </form>
        </div>
    </div>
</x-admin-layout>