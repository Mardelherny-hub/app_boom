<x-admin-layout>
    <x-slot name="header">Pages</x-slot>

    <div class="space-y-6">
        <!-- Actions Bar -->
        <div class="flex justify-between items-center">
            <div class="flex space-x-2">
                <form method="GET" class="flex space-x-2">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search pages..." 
                        value="{{ request('search') }}"
                        class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    >
                    
                    <select name="status" class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">All Status</option>
                        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm transition">
                        Filter
                    </button>
                    
                    @if(request('search') || request('status'))
                        <a href="{{ route('admin.pages.index') }}" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg text-sm transition">
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            <a href="{{ route('admin.pages.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New Page
            </a>
        </div>

        <!-- Table -->
        <x-admin.table :headers="['Title', 'Template', 'Status', 'Published', 'Actions']" :paginator="$pages">
            @forelse($pages as $page)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $page->title }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($page->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $page->template }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($page->published_at && $page->published_at <= now())
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Published
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Draft
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $page->published_at ? $page->published_at->format('M d, Y') : '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.pages.show', $page->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                View
                            </a>
                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.pages.destroy', $page->id) }}" onsubmit="return confirm('Are you sure?')">
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
                        No pages found.
                    </td>
                </tr>
            @endforelse
        </x-admin.table>
    </div>
</x-admin-layout>