<x-frontend-layout>

        <x-slot name="seo">
            {!! seo()->render() !!}
        </x-slot>

    {{-- Header --}}
    <section class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $page->title }}</h1>
            @if($page->description)
                <p class="text-xl text-gray-300">{{ $page->description }}</p>
            @endif
        </div>
    </section>

    {{-- Content --}}
    <article class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($page->blocks && count($page->blocks) > 0)
                {{-- Render blocks if available --}}
                @foreach($page->blocks as $block)
                    @switch($block['type'] ?? '')
                        @case('text')
                            <div class="prose prose-lg max-w-none mb-8">
                                {!! $block['content'] ?? '' !!}
                            </div>
                            @break
                        
                        @case('hero')
                            <div class="bg-gray-100 rounded-lg p-8 mb-8">
                                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $block['title'] ?? '' }}</h2>
                                <p class="text-lg text-gray-600">{{ $block['content'] ?? '' }}</p>
                            </div>
                            @break
                        
                        @default
                            <div class="mb-8">
                                <pre class="bg-gray-100 p-4 rounded">{{ json_encode($block, JSON_PRETTY_PRINT) }}</pre>
                            </div>
                    @endswitch
                @endforeach
            @else
                {{-- Fallback: simple description --}}
                <div class="prose prose-lg max-w-none">
                    <p>{{ $page->description }}</p>
                </div>
            @endif

        </div>
    </article>

</x-frontend-layout>