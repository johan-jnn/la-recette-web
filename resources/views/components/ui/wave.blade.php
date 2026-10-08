@props([
    'variant' => 'cream', // cream (wave.svg), white (wave-alt.svg, inversé horizontalement)
])

{{-- Bord découpé "papier déchiré" de la maquette, posé en bas d'une section (position relative) --}}
<img
    src="{{ asset($variant === 'white' ? 'images/decor/wave-alt.svg' : 'images/decor/wave.svg') }}"
    alt=""
    aria-hidden="true"
    width="1458"
    height="32"
    {{ $attributes->merge(['class' => 'pointer-events-none absolute left-0 w-full h-[31px] translate-y-px ' . ($variant === 'white' ? '-scale-x-100' : '')]) }}
/>
