<nav class="fixed w-full top-0 z-50 transition-all duration-300" 
     x-data="{ mobileMenuOpen: false, scrolled: false }" 
     @scroll.window="scrolled = window.pageYOffset > 50"
     :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-lg' : 'bg-transparent'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-3xl font-script font-bold transition-colors"
                   :class="scrolled ? 'text-boom-orange' : 'text-white'">
                    boom! <span class="text-xs font-sans font-normal">studio</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}" 
                   class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
                   :class="scrolled ? 'text-boom-gray' : 'text-white'">
                    Inicio
                </a>
                
                <a href="{{ route('services.index') }}" 
                   class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
                   :class="scrolled ? 'text-boom-gray' : 'text-white'">
                    Servicios
                </a>
                
                <a href="{{ route('portfolio.index') }}" 
                   class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
                   :class="scrolled ? 'text-boom-gray' : 'text-white'">
                    Portfolio
                </a>
                
                <a href="{{ route('blog.index') }}" 
                   class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
                   :class="scrolled ? 'text-boom-gray' : 'text-white'">
                    Blog
                </a>
                
                <a href="{{ route('contact') }}" 
                   class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
                   :class="scrolled ? 'text-boom-gray' : 'text-white'">
                    Contacto
                </a>

                @auth
                    <a href="/admin" 
                       class="flex items-center space-x-2 bg-boom-orange text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-opacity-90 transition-all transform hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Admin</span>
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        type="button" 
                        :class="scrolled ? 'text-boom-gray' : 'text-white'"
                        class="hover:text-boom-orange focus:outline-none">
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
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         @click.away="mobileMenuOpen = false"
         class="md:hidden bg-white shadow-lg">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-boom-gray hover:text-boom-orange hover:bg-gray-50 rounded-md">
                Inicio
            </a>
            <a href="{{ route('services.index') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-boom-gray hover:text-boom-orange hover:bg-gray-50 rounded-md">
                Servicios
            </a>
            <a href="{{ route('portfolio.index') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-boom-gray hover:text-boom-orange hover:bg-gray-50 rounded-md">
                Portfolio
            </a>
            <a href="{{ route('blog.index') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-boom-gray hover:text-boom-orange hover:bg-gray-50 rounded-md">
                Blog
            </a>
            <a href="{{ route('contact') }}" 
               @click="mobileMenuOpen = false"
               class="block px-3 py-2 text-base font-medium text-boom-gray hover:text-boom-orange hover:bg-gray-50 rounded-md">
                Contacto
            </a>
            
            @auth
                <a href="/admin" 
                   class="block px-3 py-2 text-base font-medium text-white bg-boom-orange hover:bg-opacity-90 rounded-md text-center">
                    Admin
                </a>
            @endauth
        </div>
    </div>
</nav>