@props([
    'bg' => 'white', // white, muted, brand, dark
    'width' => '6xl', // 2xl, 3xl, 4xl, 5xl, 6xl
    'border' => false,
    'padding' => 'py-20',
])

@php
    $bgClasses = match ($bg) {
        'muted' => 'bg-[#F9F9FB]',
        'brand' => 'bg-[#1C4937] text-white',
        'dark' => 'bg-[#171717] text-white',
        default => 'bg-white',
    };

    // Classes listées en entier pour que Tailwind les détecte
    $widthClasses = match ($width) {
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
        default => 'max-w-6xl',
    };
@endphp

<section {{ $attributes->merge(['class' => "w-full {$padding} px-6 md:px-16 {$bgClasses}" . ($border ? ' border-t border-[#E5E5E5]' : '')]) }}>
    <div class="{{ $widthClasses }} mx-auto">
        {{ $slot }}
    </div>
</section>
