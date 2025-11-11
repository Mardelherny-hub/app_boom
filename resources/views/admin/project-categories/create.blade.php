<x-admin-layout>
    <x-slot name="header">Create Project Category</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.project-categories.store') }}">
                @csrf

                <x-admin.form-input
                    label="Name"
                    name="name"
                    required
                />

                <x-admin.form-input
                    label="Slug"
                    name="slug"
                    placeholder="Auto-generated from name"
                />

                <x-admin.form-textarea
                    label="Description"
                    name="description"
                    rows="3"
                />

                <x-admin.form-input
                    label="Order"
                    name="order"
                    type="number"
                    value="0"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Create Category
                    </x-admin.button>

                    <a href="{{ route('admin.project-categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>