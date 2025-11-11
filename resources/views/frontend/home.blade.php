<x-frontend-layout >

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-gray-900 to-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                    Build Your Digital Future
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Modern web solutions tailored to your business needs. 
                    From concept to launch, we deliver excellence.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('portfolio.index') }}" 
                       class="px-8 py-3 bg-white text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition">
                        View Our Work
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-gray-900 transition">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    @if($services->count() > 0)
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    We offer comprehensive solutions to help your business thrive in the digital world.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-lg transition">
                    @if($service->getFirstMediaUrl('icon'))
                        <div class="w-16 h-16 mb-4">
                            <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                                 alt="{{ $service->title }}" 
                                 class="w-full h-full object-contain">
                        </div>
                    @endif
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($service->description, 120) }}</p>
                    
                    <a href="{{ route('services.show', $service->slug) }}" 
                       class="text-gray-900 font-semibold hover:text-gray-700 transition">
                        Learn more →
                    </a>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}" 
                   class="inline-block px-6 py-3 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
                    View All Services
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- Projects Section --}}
    @if($projects->count() > 0)
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Recent Projects</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Check out some of our latest work and success stories.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <a href="{{ route('portfolio.show', $project->slug) }}" 
                   class="group block bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition">
                    @if($project->getFirstMediaUrl('featured_image'))
                        <div class="aspect-w-16 aspect-h-9 bg-gray-200 overflow-hidden">
                            <x-lazy-image 
                                :src="$project->getFirstMediaUrl('featured_image')" 
                                :alt="$project->title"
                                class="w-full h-48 object-cover"
                            />
                        </div>
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No image</span>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        @if($project->category)
                            <span class="text-sm text-gray-500 font-medium">{{ $project->category->name }}</span>
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 mt-2 mb-2 group-hover:text-gray-700 transition">
                            {{ $project->title }}
                        </h3>
                        <p class="text-gray-600">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('portfolio.index') }}" 
                   class="inline-block px-6 py-3 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
                    View All Projects
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- Blog Section --}}
    @if($posts->count() > 0)
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Latest from Our Blog</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Insights, tips, and stories from our team.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                    @if($post->getFirstMediaUrl('featured_image'))
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <x-lazy-image 
                                :src="$post->getFirstMediaUrl('featured_image')" 
                                :alt="$post->title"
                                class="w-full h-48 object-cover"
                            />
                        </a>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            @if($post->category)
                                <span class="font-medium text-gray-700">{{ $post->category->name }}</span>
                                <span class="mx-2">•</span>
                            @endif
                            <time datetime="{{ $post->published_at->toDateString() }}">
                                {{ $post->published_at->format('M d, Y') }}
                            </time>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-gray-700 transition">
                                {{ $post->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4">{{ Str::limit($post->excerpt, 120) }}</p>
                        
                        <a href="{{ route('blog.show', $post->slug) }}" 
                           class="text-gray-900 font-semibold hover:text-gray-700 transition">
                            Read more →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}" 
                   class="inline-block px-6 py-3 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
                    View All Posts
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-16 lg:py-24 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Start Your Project?</h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Let's discuss how we can help bring your vision to life.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block px-8 py-3 bg-white text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition">
                Get in Touch
            </a>
        </div>
    </section>

</x-frontend-layout>