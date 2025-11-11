<x-admin-layout>
    <x-slot name="header">Create Page</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.pages.store') }}">
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

                <x-admin.form-select
                    label="Template"
                    name="template"
                >
                    <option value="default">Default</option>
                    <option value="home">Home</option>
                    <option value="about">About</option>
                    <option value="contact">Contact</option>
                </x-admin.form-select>

                <!-- SEO Section -->
                <div class="border-t border-gray-200 pt-4 mt-6">
                    <h3 class="text-sm font-semibold text-gray-900 mb-4">SEO Meta Tags</h3>
                    
                    <x-admin.form-input
                        label="Meta Title"
                        name="meta_title"
                        placeholder="Leave blank to use page title"
                    />

                    <x-admin.form-textarea
                        label="Meta Description"
                        name="meta_description"
                        rows="2"
                        placeholder="Leave blank to use description"
                    />
                </div>

                <x-admin.form-input
                    label="Published At"
                    name="published_at"
                    type="datetime-local"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Create Page
                    </x-admin.button>

                    <a href="{{ route('admin.pages.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>