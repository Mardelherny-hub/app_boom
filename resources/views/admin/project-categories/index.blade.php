<x-admin-layout>
    <x-slot name="header">Project Categories</x-slot>

    <div class="space-y-6">
        <!-- Actions Bar -->
        <div class="flex justify-end">
            <a href="{{ route('admin.project-categories.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New Category
            </a>
        </div>

        <!-- Table -->
        <x-admin.table :headers="['Name', 'Slug', 'Projects', 'Order', 'Actions']" :paginator="$categories">
            @forelse($categories as $category)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                        @if($category->description)
                            <div class="text-sm text-gray-500">{{ Str::limit($category->description, 50) }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $category->slug }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $category->projects()->count() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $category->order }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.project-categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.project-categories.destroy', $category->id) }}" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No categories found.
                    </td>
                </tr>
            @endforelse
        </x-admin.table>
    </div>
</x-admin-layout>