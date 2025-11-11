@props(['header' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Desktop -->
        <aside class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-900">
                <!-- Logo -->
                <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900 border-b border-gray-800">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                        <span class="text-xl font-bold text-white">{{ config('app.name') }}</span>
                    </a>
                </div>

                <!-- Navigation -->
                <div class="flex-1 flex flex-col overflow-y-auto">
                    <nav class="flex-1 px-2 py-4 space-y-1">
                        @foreach(App\Support\Admin\MenuRegistry::all() as $item)
                            @if(!isset($item['permission']) || auth()->user()->can($item['permission']))
                                @if(isset($item['children']) && count($item['children']) > 0)
                                    <div x-data="{ open: {{ request()->routeIs($item['route'].'*') ? 'true' : 'false' }} }" class="space-y-1">
                                        <button @click="open = !open" class="w-full group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-800 hover:text-white transition">
                                            <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                            </svg>
                                            <span class="flex-1 text-left">{{ $item['label'] }}</span>
                                            <svg class="ml-auto h-5 w-5 transform transition-transform" :class="{'rotate-90': open}" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        <div x-show="open" x-collapse class="space-y-1 pl-11">
                                            @foreach($item['children'] as $child)
                                                <a href="{{ route($child['route']) }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs($child['route']) ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} transition">
                                                    {{ $child['label'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route($item['route']) }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs($item['route']) ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition">
                                        <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                        {{ $item['label'] }}
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </nav>
                </div>

                <!-- User section -->
                <div class="flex-shrink-0 flex border-t border-gray-800 p-4">
                    <div class="flex items-center w-full">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ auth()->user()->getRoleNames()->first() }}</p>
                        </div>
                        <livewire:admin.logout />
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $header ?? 'Dashboard' }}</h1>
                    <a href="{{ url('/') }}" target="_blank" class="text-sm text-gray-600 hover:text-gray-900">View Site</a>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-100 p-4 sm:p-6 lg:p-8">
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mb-4 rounded-lg bg-green-50 p-4 border border-green-200">
                        <p class="text-sm text-green-800">{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mb-4 rounded-lg bg-red-50 p-4 border border-red-200">
                        <p class="text-sm text-red-800">{{ session('error') }}</p>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>