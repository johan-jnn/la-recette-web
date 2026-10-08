@props([
    'url' => '#',
    'external' => false,
    'tone' => 'brand', // brand, dark
])

<a
    href="{{ $url }}"
    @if ($external) target="_blank" rel="noopener noreferrer" @endif
    {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5 text-sm font-semibold hover:underline ' . ($tone === 'dark' ? 'text-[#171717]' : 'text-[#1C4937]')]) }}
>
    {{ $slot }}
</a>
