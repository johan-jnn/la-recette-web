@props([
    'src' => null,
    'alt' => '',
    'radius' => 'rounded-card', // rounded-card, rounded-image
    'lazy' => true,
])

{{-- Emplacement d'image de la maquette : fond neutre, coins arrondis, recadrage "cover" --}}
<div {{ $attributes->merge(['class' => "overflow-hidden bg-placeholder {$radius}"]) }}>
    <x-ui.image :src="$src" :alt="$alt" :lazy="$lazy" />
</div>
