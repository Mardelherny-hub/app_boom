<x-frontend-layout>

    <x-slot name="seo">
        {!! seo()->render() !!}
    </x-slot>

    {{-- Header --}}
    <section class="pt-32 pb-16 hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-7xl font-black text-white uppercase mb-4">{{ $page->title }}</h1>
            @if($page->description)
            <p class="text-xl text-white opacity-90">{{ $page->description }}</p>
            @endif
        </div>
    </section>

    {{-- Content --}}
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($page->content)
                <div class="prose prose-lg max-w-none prose-headings:text-boom-gray prose-a:text-boom-orange hover:prose-a:underline">
                    {!! $page->content !!}
                </div>
            @elseif($page->description)
                <div class="prose prose-lg max-w-none prose-headings:text-boom-gray prose-a:text-boom-orange">
                    {!! nl2br(e($page->description)) !!}
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-boom-blue">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Querés trabajar con nosotros?</h2>
            <p class="text-lg opacity-90 mb-8">
                Contactanos y hagamos algo increíble juntos.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-full text-sm font-bold uppercase tracking-wider hover:bg-white hover:text-boom-blue transition-all">
                Contactanos
            </a>
        </div>
    </section>

</x-frontend-layout>