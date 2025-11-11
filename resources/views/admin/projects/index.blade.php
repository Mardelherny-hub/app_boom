<x-admin-layout>
    <x-slot name="header">Projects</x-slot>

    <div class="space-y-6">
        <!-- Actions Bar -->
        <div class="flex justify-between items-center">
            <div class="flex space-x-2">
                <form method="GET" class="flex space-x-2">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search projects..." 
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
                        <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg text-sm transition">
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New Project
            </a>
        </div>

        <!-- Table -->
        <x-admin.table :headers="['Title', 'Category', 'Client', 'Status', 'Featured', 'Views', 'Actions']" :paginator="$projects">
            @forelse($projects as $project)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $project->title }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($project->description, 40) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $project->category->name ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $project->client ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($project->published_at && $project->published_at <= now())
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Published
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Draft
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @if($project->featured)
                            <span class="text-yellow-500 text-lg">★</span>
                        @else
                            <span class="text-gray-300 text-lg">☆</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $project->views }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                View
                            </a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" onsubmit="return confirm('Are you sure?')">
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
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                        No projects found.
                    </td>
                </tr>
            @endforelse
        </x-admin.table>
    </div>
</x-admin-layout>