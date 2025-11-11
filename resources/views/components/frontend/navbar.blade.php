<nav class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-gray-900">{{ config('app.name') }}</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition {{ request()->routeIs('home') ? 'text-gray-900 border-b-2 border-gray-900' : '' }}">
                    Home
                </a>
                
                <a href="{{ route('services.index') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition {{ request()->routeIs('services.*') ? 'text-gray-900 border-b-2 border-gray-900' : '' }}">
                    Services
                </a>
                
                <a href="{{ route('portfolio.index') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition {{ request()->routeIs('portfolio.*') ? 'text-gray-900 border-b-2 border-gray-900' : '' }}">
                    Portfolio
                </a>
                
                <a href="{{ route('blog.index') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition {{ request()->routeIs('blog.*') ? 'text-gray-900 border-b-2 border-gray-900' : '' }}">
                    Blog
                </a>
                
                <a href="{{ route('contact') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition {{ request()->routeIs('contact') ? 'text-gray-900 border-b-2 border-gray-900' : '' }}">
                    Contact
                </a>

                @auth
                    <a href="/admin" 
                       class="ml-4 px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition">
                        Dashboard
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        type="button" 
                        class="text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         @click.away="mobileMenuOpen = false"
         class="md:hidden border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md {{ request()->routeIs('home') ? 'bg-gray-100 text-gray-900' : '' }}">
                Home
            </a>
            <a href="{{ route('services.index') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md {{ request()->routeIs('services.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                Services
            </a>
            <a href="{{ route('portfolio.index') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md {{ request()->routeIs('portfolio.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                Portfolio
            </a>
            <a href="{{ route('blog.index') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md {{ request()->routeIs('blog.*') ? 'bg-gray-100 text-gray-900' : '' }}">
                Blog
            </a>
            <a href="{{ route('contact') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md {{ request()->routeIs('contact') ? 'bg-gray-100 text-gray-900' : '' }}">
                Contact
            </a>
            
            @auth
                <a href="/admin" 
                   class="block px-3 py-2 text-base font-medium text-white bg-gray-900 hover:bg-gray-800 rounded-md">
                    Dashboard
                </a>
            @endauth
        </div>
    </div>
</nav>