@props([
    'name', // fichier dans public/images/decor (sans extension)
    'width',
    'height',
])

{{-- Forme décorative de la maquette (positionnement fourni par l'appelant) --}}
<img
    src="{{ asset("images/decor/{$name}.svg") }}"
    alt=""
    aria-hidden="true"
    width="{{ $width }}"
    height="{{ $height }}"
    {{ $attributes->merge(['class' => 'pointer-events-none absolute select-none max-w-none']) }}
/>
