<x-admin-layout>
    <x-slot name="header">Edit Page</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.pages.update', $page->id) }}">
                @csrf
                @method('PUT')

                <x-admin.form-input
                    label="Title"
                    name="title"
                    :value="$page->title"
                    required
                />

                <x-admin.form-input
                    label="Slug"
                    name="slug"
                    :value="$page->slug"
                />

                <x-admin.form-textarea
                    label="Description"
                    name="description"
                    :value="$page->description"
                    rows="3"
                />

                <x-admin.trix-editor
                    label="Contenido"
                    name="content"
                    :value="$page->content"
                />

                <x-admin.form-select
                    label="Template"
                    name="template"
                >
                    <option value="default" {{ $page->template === 'default' ? 'selected' : '' }}>Default</option>
                    <option value="home" {{ $page->template === 'home' ? 'selected' : '' }}>Home</option>
                    <option value="about" {{ $page->template === 'about' ? 'selected' : '' }}>About</option>
                    <option value="contact" {{ $page->template === 'contact' ? 'selected' : '' }}>Contact</option>
                </x-admin.form-select>

                <!-- Menu Settings -->
                <div class="border-t border-gray-200 pt-4 mt-6">
                    <h3 class="text-sm font-semibold text-gray-900 mb-4">Configuración de Menú</h3>
                    
                    <div class="flex items-center mb-4">
                        <input type="checkbox" name="show_in_menu" id="show_in_menu" value="1" 
                            {{ $page->show_in_menu ? 'checked' : '' }}
                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="show_in_menu" class="ml-2 text-sm text-gray-700">Mostrar en menú de navegación</label>
                    </div>
                    
                    <x-admin.form-input
                        label="Orden en menú"
                        name="menu_order"
                        type="number"
                        :value="$page->menu_order ?? 0"
                        placeholder="0 = primero"
                    />
                </div>

                <!-- SEO Section -->
                <div class="border-t border-gray-200 pt-4 mt-6">
                    <h3 class="text-sm font-semibold text-gray-900 mb-4">SEO Meta Tags</h3>
                    
                    <x-admin.form-input
                        label="Meta Title"
                        name="meta_title"
                        :value="$page->meta_title"
                        placeholder="Leave blank to use page title"
                    />

                    <x-admin.form-textarea
                        label="Meta Description"
                        name="meta_description"
                        :value="$page->meta_description"
                        rows="2"
                        placeholder="Leave blank to use description"
                    />
                </div>

                <x-admin.form-input
                    label="Published At"
                    name="published_at"
                    type="datetime-local"
                    :value="$page->published_at ? $page->published_at->format('Y-m-d\TH:i') : ''"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Update Page
                    </x-admin.button>

                    <a href="{{ route('admin.pages.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>
                </div>
                </form>

                <form method="POST" action="{{ route('admin.pages.destroy', $page->id) }}" onsubmit="return confirm('Are you sure?')" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <x-admin.button type="submit" variant="danger">
                        Delete Page
                    </x-admin.button>
                </form>
            </form>
        </div>
    </div>
</x-admin-layout>