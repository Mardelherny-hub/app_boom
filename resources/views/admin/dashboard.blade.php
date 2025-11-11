<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Stats Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500">Users</div>
                        <div class="text-2xl font-bold">{{ $stats['users'] }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500">Services</div>
                        <div class="text-2xl font-bold">{{ $stats['services'] }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500">Projects</div>
                        <div class="text-2xl font-bold">{{ $stats['projects'] }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500">Posts</div>
                        <div class="text-2xl font-bold">{{ $stats['posts'] }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm text-gray-500">Unread Messages</div>
                        <div class="text-2xl font-bold text-red-600">{{ $stats['unread_messages'] }}</div>
                    </div>
                </div>

            </div>

            {{-- Recent Content --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                {{-- Recent Posts --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Recent Posts</h3>
                        <div class="space-y-3">
                            @forelse($recentPosts as $post)
                                <div class="border-b pb-2">
                                    <a href="{{ route('admin.posts.show', $post) }}" class="text-blue-600 hover:underline">
                                        {{ $post->title }}
                                    </a>
                                    <div class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</div>
                                </div>
                            @empty
                                <p class="text-gray-500">No posts yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Recent Messages --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Recent Messages</h3>
                        <div class="space-y-3">
                            @forelse($recentMessages as $message)
                                <div class="border-b pb-2">
                                    <a href="{{ route('admin.messages.show', $message) }}" 
                                       class="text-blue-600 hover:underline {{ $message->read_at ? '' : 'font-bold' }}">
                                        {{ $message->subject ?? 'No Subject' }}
                                    </a>
                                    <div class="text-xs text-gray-500">
                                        From: {{ $message->name }} - {{ $message->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No messages yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-admin-layout>