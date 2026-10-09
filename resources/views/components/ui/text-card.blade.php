@props([
    'title',
    'description' => null,
    'link' => null, // ['label' => ..., 'url' => ..., 'external' => bool]
    'note' => null,
    'tone' => 'white', // white, cream, forest, rose
])

@php
    // Couleurs de fond, de titre, de texte et variante du bouton selon le ton
    $styles = match ($tone) {
        'forest' => ['card' => 'bg-forest', 'title' => 'text-white', 'text' => 'text-white', 'button' => 'cream'],
        'cream' => ['card' => 'bg-cream', 'title' => 'text-forest', 'text' => 'text-forest', 'button' => 'forest'],
        'rose' => ['card' => 'bg-rose', 'title' => 'text-white', 'text' => 'text-white', 'button' => 'cream'],
        default => ['card' => 'bg-white', 'title' => 'text-forest', 'text' => 'text-muted', 'button' => 'outline'],
    };
@endphp

{{-- Carte textuelle : titre, description, lien et note optionnels --}}
<div {{ $attributes->merge(['class' => "p-8 rounded-card {$styles['card']} flex flex-col justify-between gap-6"]) }}>
    <div class="flex flex-col gap-4">
        <h3 class="text-subtitle font-bold {{ $styles['title'] }}">{{ $title }}</h3>
        @if ($description)
            <p class="text-base leading-[1.55] {{ $styles['text'] }}">{{ $description }}</p>
        @endif
    </div>

    @if ($link)
        <div class="flex flex-col gap-2 items-start">
            <x-ui.button :url="$link['url']" :external="$link['external'] ?? false" :variant="$styles['button']">
                {{ $link['label'] }}
                @if (!empty($link['external']))
                    <x-ui.icon name="arrow-up-right" size="w-4 h-4" />
                @endif
            </x-ui.button>
            @if ($note)
                <p class="text-sm {{ $styles['text'] }}">{{ $note }}</p>
            @endif
        </div>
    @endif
</div>
