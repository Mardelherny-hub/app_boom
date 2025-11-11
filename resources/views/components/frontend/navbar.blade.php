{{-- Navbar Boom Studio - Adaptado del diseño original --}}
<header class="fixed w-full top-0 z-50 transition-all duration-300" 
        x-data="{ menuOpen: false, scrolled: false }" 
        @scroll.window="scrolled = window.pageYOffset > 50"
        :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-lg' : 'bg-transparent'">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
        
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="text-3xl font-script font-bold transition-colors"
           :class="scrolled ? 'text-boom-orange' : 'text-white'">
            boom! <span class="text-xs font-sans font-normal">studio</span>
        </a>
        
        {{-- Desktop Menu --}}
        <nav class="hidden md:flex items-center space-x-8">
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
            
            {{-- Login Button --}}
            @auth
                <a href="/admin" 
                   class="flex items-center space-x-2 bg-boom-orange text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-opacity-90 transition-all transform hover:scale-105">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Admin</span>
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="flex items-center space-x-2 bg-boom-orange text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-opacity-90 transition-all transform hover:scale-105">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Login</span>
                </a>
            @endauth
        </nav>
        
        {{-- Mobile Menu Button --}}
        <button @click="menuOpen = !menuOpen" 
                class="md:hidden transition-colors" 
                :class="scrolled ? 'text-boom-gray' : 'text-white'">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                <path x-show="menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    
    {{-- Mobile Menu --}}
    <div x-show="menuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.away="menuOpen = false"
         class="md:hidden bg-white shadow-lg">
        <nav class="px-4 py-4 space-y-2">
            <a href="{{ route('home') }}" 
               @click="menuOpen = false"
               class="block py-2 text-boom-gray hover:text-boom-orange transition-colors font-medium">
                Inicio
            </a>
            <a href="{{ route('services.index') }}" 
               @click="menuOpen = false"
               class="block py-2 text-boom-gray hover:text-boom-orange transition-colors font-medium">
                Servicios
            </a>
            <a href="{{ route('portfolio.index') }}" 
               @click="menuOpen = false"
               class="block py-2 text-boom-gray hover:text-boom-orange transition-colors font-medium">
                Portfolio
            </a>
            <a href="{{ route('blog.index') }}" 
               @click="menuOpen = false"
               class="block py-2 text-boom-gray hover:text-boom-orange transition-colors font-medium">
                Blog
            </a>
            <a href="{{ route('contact') }}" 
               @click="menuOpen = false"
               class="block py-2 text-boom-gray hover:text-boom-orange transition-colors font-medium">
                Contacto
            </a>
            
            @auth
                <a href="/admin" 
                   class="block py-2 px-4 bg-boom-orange text-white rounded-lg text-center font-medium hover:bg-opacity-90 transition-colors">
                    Admin
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="block py-2 px-4 bg-boom-orange text-white rounded-lg text-center font-medium hover:bg-opacity-90 transition-colors">
                    Login
                </a>
            @endauth
        </nav>
    </div>
</header>