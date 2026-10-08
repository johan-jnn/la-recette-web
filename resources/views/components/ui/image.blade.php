@props([
    'src' => null,
    'alt' => '',
    'fallback' => null,
    'lazy' => true,
])

@php
    // Les images Filament sont stockées sur le disque "public" (chemin relatif)
    // ou en URL absolue (ex. couverture importée depuis ListenNotes).
    $url = match (true) {
        blank($src) => $fallback,
        \Illuminate\Support\Str::startsWith($src, ['http://', 'https://', '//']) => $src,
        default => \Illuminate\Support\Facades\Storage::disk('public')->url($src),
    };
@endphp

@if ($url)
<img
    src="{{ $url }}"
    alt="{{ $alt }}"
    @if ($lazy) loading="lazy" @endif
    {{ $attributes->merge(['class' => 'w-full h-full object-cover']) }}
/>
@endif
