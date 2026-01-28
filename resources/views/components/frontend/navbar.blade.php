@php
    $menuPages = \App\Domain\Pages\Models\Page::inMenu()->get();
@endphp

<header class="fixed w-full top-0 z-50 transition-all duration-300" 
        x-data="{ menuOpen: false, scrolled: false }" 
        @scroll.window="scrolled = window.pageYOffset > 50"
        :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg' : 'bg-transparent'">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
        
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-7xl font-script font-bold transition-colors"
           :class="scrolled ? 'text-boom-orange' : 'text-boom-gray'">
            boom! <span class="text-xs font-sans font-normal tracking-widest">studio</span>
        </a>
        
        <!-- Desktop Menu -->
        <nav class="hidden md:flex items-center space-x-8">
            <a href="{{ route('home') }}" 
               class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
               :class="scrolled ? 'text-boom-gray' : 'text-boom-gray'">Inicio</a>
            <a href="{{ route('services.index') }}" 
               class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
               :class="scrolled ? 'text-boom-gray' : 'text-boom-gray'">Servicios</a>
            <a href="{{ route('portfolio.index') }}" 
               class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
               :class="scrolled ? 'text-boom-gray' : 'text-boom-gray'">Portfolio</a>
            
            {{-- Páginas dinámicas --}}
            @foreach($menuPages as $menuPage)
            <a href="{{ route('page.show', $menuPage->slug) }}" 
               class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
               :class="scrolled ? 'text-boom-gray' : 'text-boom-gray'">{{ $menuPage->title }}</a>
            @endforeach
            
            <a href="{{ route('blog.index') }}" 
                class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
                :class="scrolled ? 'text-boom-gray' : 'text-boom-gray'">Blog</a>
            <a href="{{ route('contact') }}" 
               class="text-sm font-medium uppercase tracking-wide hover:text-boom-orange transition-colors"
               :class="scrolled ? 'text-boom-gray' : 'text-boom-gray'">Contacto</a>
            
            <!-- Admin Button -->
            <a href="{{ route('login') }}" 
               class="flex items-center space-x-2 bg-boom-orange text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-opacity-90 transition-all transform hover:scale-105">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>Admin</span>
            </a>
        </nav>
        
        <!-- Mobile Menu Button -->
        <button @click="menuOpen = !menuOpen" class="md:hidden" :class="scrolled ? 'text-boom-gray' : 'text-boom-gray'">
            <svg x-show="!menuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg x-show="menuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    
    <!-- Mobile Menu -->
    <div x-show="menuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden bg-white/95 backdrop-blur-md border-t px-6 py-4">
        <nav class="flex flex-col space-y-4">
            <a href="{{ route('home') }}" class="text-sm font-medium uppercase text-boom-gray hover:text-boom-orange">Inicio</a>
            <a href="{{ route('services.index') }}" class="text-sm font-medium uppercase text-boom-gray hover:text-boom-orange">Servicios</a>
            <a href="{{ route('portfolio.index') }}" class="text-sm font-medium uppercase text-boom-gray hover:text-boom-orange">Portfolio</a>
            
            {{-- Páginas dinámicas --}}
            @foreach($menuPages as $menuPage)
            <a href="{{ route('page.show', $menuPage->slug) }}" class="text-sm font-medium uppercase text-boom-gray hover:text-boom-orange">{{ $menuPage->title }}</a>
            @endforeach
            
            <a href="{{ route('blog.index') }}" class="text-sm font-medium uppercase text-boom-gray hover:text-boom-orange">Blog</a>
            <a href="{{ route('contact') }}" class="text-sm font-medium uppercase text-boom-gray hover:text-boom-orange">Contacto</a>
            <a href="{{ route('login') }}" 
               class="flex items-center justify-center space-x-2 bg-boom-orange text-white px-4 py-2 rounded-full text-sm font-medium w-full">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>Admin</span>
            </a>
        </nav>
    </div>
</header>