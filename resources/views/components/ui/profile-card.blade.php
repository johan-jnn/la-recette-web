@props([
    'image' => null,
    'title',
    'description' => null,
    'shape' => 'rounded', // rounded (visuel arrondi, texte à gauche), round (portrait rond, texte centré)
])

{{-- Carte de présentation (équipe, intervenants) : portrait, rôle, courte description --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-5 text-forest ' . ($shape === 'round' ? 'items-center text-center' : '')]) }}>
    @if ($shape === 'round')
        <x-ui.media :src="$image" :alt="$title" radius="rounded-full" class="aspect-square w-full max-w-[292px]" />
    @else
        <x-ui.media :src="$image" :alt="$title" radius="rounded-image" class="h-[210px] w-full" />
    @endif
    <h3 class="text-subtitle font-bold">{{ $title }}</h3>
    @if ($description)
        <p class="text-body-lg text-muted">{{ $description }}</p>
    @endif
</div>
