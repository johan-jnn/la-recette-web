@props([
    'platform', // App\Enums\Platform
])

@php
    $icon = match ($platform) {
        \App\Enums\Platform::SPOTIFY => 'spotify',
        \App\Enums\Platform::DEEZER => 'deezer',
        \App\Enums\Platform::APPLE_MUSIC => 'apple-music',
        default => 'play',
    };
@endphp

<x-ui.icon :name="$icon" {{ $attributes }} />
