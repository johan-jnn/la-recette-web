@props([
    'url' => null,
    'variant' => 'sage', // sage, forest, forest-sun, rose, sun, sun-light, cream, white, outline, neutral
    'type' => 'button',
    'external' => false,
    'label' => null,
])

{{-- Bouton "pilule" (composant Figma "Bouton") — styles dans resources/css/components/buttons.css --}}
@php
    $classes = match ($variant) {
        'forest' => 'btn btn-forest',
        'forest-sun' => 'btn btn-forest-sun',
        'cream' => 'btn btn-cream',
        'rose' => 'btn btn-rose',
        'sun' => 'btn btn-sun',
        'sun-light' => 'btn btn-sun-light',
        'white' => 'btn btn-white',
        'outline' => 'btn btn-outline',
        'neutral' => 'btn btn-neutral',
        default => 'btn btn-sage',
    };
@endphp

@if ($url)
    <a
        href="{{ $url }}"
        @if ($external) target="_blank" rel="noopener noreferrer" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $label ?? $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $label ?? $slot }}
    </button>
@endif
