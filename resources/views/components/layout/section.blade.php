@props([
    'bg' => 'cream', // cream, white, forest, sage
    'width' => 'page', // page (1280px), 5xl, 3xl, 2xl
    'padding' => 'py-16 md:py-[72px]',
])

@php
    $bgClasses = match ($bg) {
        'white' => 'bg-white',
        'forest' => 'bg-forest text-white',
        'sage' => 'bg-sage text-white',
        default => 'bg-cream',
    };

    // Classes listées en entier pour que Tailwind les détecte
    $widthClasses = match ($width) {
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '5xl' => 'max-w-5xl',
        default => 'max-w-page',
    };
@endphp

{{-- Section pleine largeur (fond) + conteneur centré. Slot "decor" : éléments décoratifs absolus. --}}
<section {{ $attributes->merge(['class' => "relative w-full overflow-hidden px-6 md:px-20 {$padding} {$bgClasses}"]) }}>
    {{ $decor ?? '' }}

    <div class="relative {{ $widthClasses }} mx-auto">
        {{ $slot }}
    </div>
</section>
