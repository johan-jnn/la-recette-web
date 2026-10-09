@props([
    'tone' => 'forest', // forest, light, rose
])

@php
    $toneClass = match ($tone) {
        'light' => 'text-white',
        'rose' => 'text-rose',
        default => 'text-forest',
    };
@endphp

<p {{ $attributes->merge(['class' => "text-sm leading-normal {$toneClass}"]) }}>
    {{ $slot }}
</p>
