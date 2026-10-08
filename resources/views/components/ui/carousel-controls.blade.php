{{-- Flèches précédent / suivant : à placer dans le slot "header" de <x-ui.carousel> --}}
<div {{ $attributes->merge(['class' => 'flex items-center gap-2']) }} x-show="maxIndex() > 0">
    <x-ui.icon-button icon="chevron-left" label="Précédent" @click="prev()" />
    <x-ui.icon-button icon="chevron-right" label="Suivant" @click="next()" />
</div>
