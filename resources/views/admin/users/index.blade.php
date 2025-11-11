<x-admin-layout>
    <x-slot name="header">Users</x-slot>

    <div class="space-y-6">
        <!-- Actions Bar -->
        <div class="flex justify-between items-center">
            <div class="flex space-x-2">
                <form method="GET" class="flex space-x-2">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search users..." 
                        value="{{ request('search') }}"
                        class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    >

                    <button type="submit" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm transition">
                        Search
                    </button>
                    
                    @if(request('search'))
                        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg text-sm transition">
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New User
            </a>
        </div>

        <!-- Table -->
        <x-admin.table :headers="['Name', 'Email', 'Role', 'Created', 'Actions']" :paginator="$users">
            @forelse($users as $user)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                        @if($user->phone)
                            <div class="text-sm text-gray-500">{{ $user->phone }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $user->email }}</div>
                        @if($user->email_verified_at)
                            <span class="text-xs text-green-600">Verified</span>
                        @else
                            <span class="text-xs text-gray-500">Not verified</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $user->getRoleNames()->first() ?? 'No Role' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.users.show', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                View
                            </a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                Edit
                            </a>
                            @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No users found.
                    </td>
                </tr>
            @endforelse
        </x-admin.table>
    </div>
</x-admin-layout>