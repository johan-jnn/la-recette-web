@props([
    'variant' => 'sage', // sage, forest
])

{{-- Bouton de soumission ("x-ui.button" est adossé à une classe qui impose une URL) --}}
<button
    type="submit"
    {{ $attributes->merge(['class' => 'btn ' . ($variant === 'forest' ? 'btn-forest' : 'btn-sage')]) }}
>
    {{ $slot }}
</button>
