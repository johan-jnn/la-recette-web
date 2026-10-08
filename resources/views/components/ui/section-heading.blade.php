@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left', // left, center
    'tone' => 'forest', // forest, light
    'spacing' => 'mb-8',
])

{{-- En-tête de section : sur-titre, titre, description et actions (slot) alignées à droite --}}
<div data-reveal {{ $attributes->merge(['class' => "{$spacing} flex flex-col gap-4 " . ($align === 'center' ? 'items-center text-center' : 'md:flex-row md:items-center md:justify-between')]) }}>
    <div class="flex flex-col gap-5 {{ $tone === 'light' ? 'text-white' : 'text-forest' }}">
        @if ($eyebrow)
            <x-ui.eyebrow :tone="$tone">{{ $eyebrow }}</x-ui.eyebrow>
        @endif

        <h2 class="text-title font-bold">{{ $title }}</h2>

        @if ($description)
            <p class="text-body-lg {{ $align === 'center' ? 'max-w-2xl' : '' }}">{{ $description }}</p>
        @endif
    </div>

    @if ($slot->isNotEmpty())
        <div class="flex flex-wrap items-center gap-5 shrink-0">
            {{ $slot }}
        </div>
    @endif
</div>
