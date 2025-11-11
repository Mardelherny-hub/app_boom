<x-frontend-layout>

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Header --}}
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('services.index') }}" 
               class="inline-block text-sm font-medium text-gray-300 hover:text-white mb-4">
                ← All Services
            </a>
            
            <div class="flex items-start gap-6">
                @if($service->getFirstMediaUrl('icon'))
                <div class="w-20 h-20 flex-shrink-0">
                    <img src="{{ $service->getFirstMediaUrl('icon') }}" 
                         alt="{{ $service->title }}" 
                         class="w-full h-full object-contain">
                </div>
                @endif
                
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $service->title }}</h1>
                    <p class="text-xl text-gray-300">{{ $service->description }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if($service->getFirstMediaUrl('image'))
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <img src="{{ $service->getFirstMediaUrl('image') }}" 
                 alt="{{ $service->title }}"
                 class="w-full rounded-lg shadow-lg">
        </div>
    </section>
    @endif

    {{-- Content --}}
    <article class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($service->content)
                <div class="prose prose-lg max-w-none">
                    {!! $service->content !!}
                </div>
            @else
                <p class="text-gray-600 text-lg">{{ $service->description }}</p>
            @endif
        </div>
    </article>

    {{-- Other Services --}}
    @if($otherServices->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Other Services</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($otherServices as $otherService)
                <article class="bg-white rounded-lg p-6 hover:shadow-lg transition">
                    @if($otherService->getFirstMediaUrl('icon'))
                    <div class="w-12 h-12 mb-4">
                        <img src="{{ $otherService->getFirstMediaUrl('icon') }}" 
                             alt="{{ $otherService->title }}" 
                             class="w-full h-full object-contain">
                    </div>
                    @endif
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $otherService->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($otherService->description, 100) }}</p>
                    
                    <a href="{{ route('services.show', $otherService->slug) }}" 
                       class="text-gray-900 font-semibold hover:text-gray-700 transition">
                        Learn more →
                    </a>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-16 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Interested in {{ $service->title }}?</h2>
            <p class="text-xl text-gray-300 mb-8">
                Let's discuss how we can help your business.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block px-8 py-3 bg-white text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition">
                Get in Touch
            </a>
        </div>
    </section>

</x-frontend-layout>