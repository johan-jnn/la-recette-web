@props([
    'variant' => 'brand', // brand, dark
])

{{-- Bouton de soumission ("x-ui.button" est réservé aux liens : sa classe impose une URL) --}}
<button
    type="submit"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-6 py-3 rounded-full text-white text-sm font-semibold transition-colors cursor-pointer ' . ($variant === 'dark' ? 'bg-[#171717] hover:bg-black' : 'bg-[#1C4937] hover:bg-[#143628] shadow-sm')]) }}
>
    {{ $slot }}
</button>
