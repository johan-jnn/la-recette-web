@props([
    'variant' => 'sage', // sage, forest, cream
])

{{-- Bouton de soumission ("x-ui.button" est adossé à une classe qui impose une URL) --}}
<button
    type="submit"
    {{ $attributes->merge(['class' => 'btn ' . match ($variant) { 'forest' => 'btn-forest', 'cream' => 'btn-cream', default => 'btn-sage' }]) }}
>
    {{ $slot }}
</button>
