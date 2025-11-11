<x-admin-layout>
    <x-slot name="header">Contact Messages</x-slot>

    <div class="space-y-6">
        <!-- Table -->
        <x-admin.table :headers="['Name', 'Email', 'Subject', 'Status', 'Received', 'Actions']" :paginator="$messages">
            @forelse($messages as $message)
                <tr class="{{ $message->read_at ? 'bg-white' : 'bg-blue-50' }}">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                        @if($message->phone)
                            <div class="text-sm text-gray-500">{{ $message->phone }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $message->email }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $message->subject }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($message->message, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($message->read_at)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Read
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Unread
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $message->created_at->format('M d, Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                View
                            </a>
                            <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" onsubmit="return confirm('Are you sure?')">
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
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        No messages found.
                    </td>
                </tr>
            @endforelse
        </x-admin.table>
    </div>
</x-admin-layout>