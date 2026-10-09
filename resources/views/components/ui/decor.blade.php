@props([
    'name', // fichier dans public/images/decor (sans extension)
    'width',
    'height',
    'color' => null, // null (couleur du fichier), cream, sage, forest, rose, sun — recolore la forme via un masque CSS
])

@php
    // Classes listées en entier pour que Tailwind les détecte
    $colorClass = match ($color) {
        'cream' => 'bg-cream',
        'sage' => 'bg-sage',
        'forest' => 'bg-forest',
        'rose' => 'bg-rose',
        'sun' => 'bg-sun',
        default => null,
    };
    $src = asset("images/decor/{$name}.svg");
@endphp

{{-- Forme décorative de la maquette (positionnement fourni par l'appelant) --}}
@if ($colorClass)
    <span
        aria-hidden="true"
        data-parallax
        style="mask: url('{{ $src }}') center / contain no-repeat; -webkit-mask: url('{{ $src }}') center / contain no-repeat; aspect-ratio: {{ $width }} / {{ $height }};"
        {{ $attributes->merge(['class' => "pointer-events-none absolute select-none {$colorClass}"]) }}
    ></span>
@else
    <img
        src="{{ $src }}"
        alt=""
        aria-hidden="true"
        data-parallax
        width="{{ $width }}"
        height="{{ $height }}"
        {{ $attributes->merge(['class' => 'pointer-events-none absolute select-none max-w-none']) }}
    />
@endif
