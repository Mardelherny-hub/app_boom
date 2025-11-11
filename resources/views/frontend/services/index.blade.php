<x-frontend-layout>

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Header --}}
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Services</h1>
            <p class="text-xl text-gray-300">Comprehensive solutions to help your business thrive</p>
        </div>
    </section>

    {{-- Services Grid --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                    <article class="bg-white rounded-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        @if($service->getFirstMediaUrl('icon'))
                        <div class="w-16 h-16 mb-6">
                            <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                                 alt="{{ $service->title }}" 
                                 class="w-full h-full object-contain">
                        </div>
                        @endif
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $service->title }}</h3>
                        
                        <p class="text-gray-600 mb-6">{{ $service->description }}</p>
                        
                        <a href="{{ route('services.show', $service->slug) }}" 
                           class="inline-flex items-center text-gray-900 font-semibold hover:text-gray-700 transition">
                            Learn more 
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </article>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <p class="text-gray-500">No services available at the moment.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Get Started?</h2>
            <p class="text-xl text-gray-300 mb-8">
                Let's discuss how our services can help achieve your goals.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block px-8 py-3 bg-white text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition">
                Contact Us
            </a>
        </div>
    </section>

</x-frontend-layout>