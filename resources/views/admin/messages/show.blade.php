<x-admin-layout>
    <x-slot name="header">Message Details</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $message->subject }}</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm transition">
                        Back
                    </a>
                    <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Name</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $message->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email</label>
                        <p class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $message->email }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ $message->email }}
                            </a>
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Phone</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $message->phone ?? '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Status</label>
                        <p class="mt-1">
                            @if($message->read_at)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Read - {{ $message->read_at->format('M d, Y H:i') }}
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Unread
                                </span>
                            @endif
                        </p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Subject</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $message->subject }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Message</label>
                    <div class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-lg p-4">
                        {!! nl2br(e($message->message)) !!}
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">IP Address</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $message->ip_address ?? '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Received At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $message->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>