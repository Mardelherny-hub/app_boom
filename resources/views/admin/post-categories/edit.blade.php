<x-admin-layout>
    <x-slot name="header">Edit Post Category</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.post-categories.update', $category->id) }}">
                @csrf
                @method('PUT')

                <x-admin.form-input
                    label="Name"
                    name="name"
                    :value="$category->name"
                    required
                />

                <x-admin.form-input
                    label="Slug"
                    name="slug"
                    :value="$category->slug"
                />

                <x-admin.form-textarea
                    label="Description"
                    name="description"
                    :value="$category->description"
                    rows="3"
                />

                <x-admin.form-input
                    label="Order"
                    name="order"
                    type="number"
                    :value="$category->order"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Update Category
                    </x-admin.button>

                    <a href="{{ route('admin.post-categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>

                    <form method="POST" action="{{ route('admin.post-categories.destroy', $category->id) }}" onsubmit="return confirm('Are you sure?')" class="ml-auto">
                        @csrf
                        @method('DELETE')
                        <x-admin.button type="submit" variant="danger">
                            Delete Category
                        </x-admin.button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>