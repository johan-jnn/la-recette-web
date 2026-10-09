@props([
    'quote',
    'description' => null,
    'tag' => 'p', // h1 lorsque la carte sert d'en-tête de page
    'tone' => 'forest', // forest, cream, sage
])

@php
    $toneClasses = match ($tone) {
        'cream' => 'bg-cream text-forest',
        'sage' => 'bg-sage text-white',
        default => 'bg-forest text-cream',
    };
@endphp

{{-- Carte centrée : grande citation, description et actions. Slot "decor" : formes décoratives internes --}}
<div data-reveal="scale" {{ $attributes->merge(['class' => "relative mx-auto flex max-w-[1140px] flex-col items-center gap-10 overflow-hidden rounded-card px-6 py-16 md:px-[146px] md:py-20 text-center {$toneClasses}"]) }}>
    {{ $decor ?? '' }}

    <{{ $tag }} class="relative text-3xl md:text-quote font-medium max-w-[848px]">{{ $quote }}</{{ $tag }}>

    @if ($description)
        <p class="relative text-body-lg max-w-[564px]">{{ $description }}</p>
    @endif

    @if ($slot->isNotEmpty())
        <div class="relative flex flex-wrap items-center justify-center gap-5">
            {{ $slot }}
        </div>
    @endif
</div>
