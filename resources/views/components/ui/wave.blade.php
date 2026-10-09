@props([
    'variant' => 'cream', // cream (wave.svg), white (wave-alt.svg, inversé horizontalement), forest (wave.svg recolorée)
    'edge' => 'inside', // inside (bas de la section, dans la section), below (sous la section, vers le bas), above (au-dessus de la section)
])

@php
    // Position (chevauchement de 1px pour éviter un liseré) et orientation selon le bord
    $edgeClasses = match ($edge) {
        'below' => 'top-[calc(100%-1px)] -scale-y-100',
        'above' => 'bottom-[calc(100%-1px)]',
        default => 'bottom-0 translate-y-px',
    };
    $flip = $variant === 'white' ? '-scale-x-100' : '';
    $shape = asset($variant === 'white' ? 'images/decor/wave-alt.svg' : 'images/decor/wave.svg');
@endphp

{{-- Bord découpé "papier déchiré" de la maquette, posé sur un bord de section (position relative) --}}
@if ($variant === 'forest')
    <span
        aria-hidden="true"
        style="mask: url('{{ $shape }}') center / 100% 100% no-repeat; -webkit-mask: url('{{ $shape }}') center / 100% 100% no-repeat;"
        {{ $attributes->merge(['class' => "pointer-events-none absolute left-0 z-10 block w-full h-[31px] bg-forest {$edgeClasses}"]) }}
    ></span>
@else
    <img
        src="{{ $shape }}"
        alt=""
        aria-hidden="true"
        width="1458"
        height="32"
        {{ $attributes->merge(['class' => "pointer-events-none absolute left-0 z-10 w-full h-[31px] {$edgeClasses} {$flip}"]) }}
    />
@endif
