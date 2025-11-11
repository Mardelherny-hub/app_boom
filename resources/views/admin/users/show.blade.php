<x-admin-layout>
    <x-slot name="header">User Details</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $user->name }}</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">
                        Edit
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm transition">
                        Back
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">UUID</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->uuid }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Name</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Phone</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->phone ?? '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Role</label>
                        <p class="mt-1">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $user->getRoleNames()->first() ?? 'No Role' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-500">Bio</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->bio ?? '-' }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email Verified</label>
                        <p class="mt-1">
                            @if($user->email_verified_at)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Yes - {{ $user->email_verified_at->format('M d, Y') }}
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Not Verified
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created At</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>