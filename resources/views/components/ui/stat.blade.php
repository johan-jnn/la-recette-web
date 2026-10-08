@props([
    'value',
    'label',
    'tone' => 'forest', // forest, light
])

{{-- Chiffre clé : valeur mise en avant et légende --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-2 ' . ($tone === 'light' ? 'text-white' : 'text-forest')]) }}>
    <p class="text-quote font-bold">{{ $value }}</p>
    <p class="text-body-lg">{{ $label }}</p>
</div>
