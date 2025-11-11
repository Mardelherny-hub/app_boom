{{-- SEO Meta Tags --}}
<title>{{ $meta['title'] }}</title>
<meta name="description" content="{{ $meta['description'] }}">
@if(!empty($meta['keywords']))
<meta name="keywords" content="{{ implode(', ', $meta['keywords']) }}">
@endif
<meta name="robots" content="{{ $meta['robots'] }}">
<link rel="canonical" href="{{ $meta['canonical'] }}">

{{-- Open Graph Tags --}}
@foreach($openGraph as $property => $content)
<meta property="{{ $property }}" content="{{ $content }}">
@endforeach

{{-- Twitter Card Tags --}}
@foreach($twitter as $name => $content)
<meta name="{{ $name }}" content="{{ $content }}">
@endforeach

{{-- Schema.org JSON-LD --}}
@if($schema)
<script type="application/ld+json">{!! $schema !!}</script>
@endif