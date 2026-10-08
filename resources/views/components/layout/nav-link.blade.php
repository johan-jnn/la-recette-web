@props([
    'url',
    'active' => false,
])

<a
    href="{{ $url }}"
    @if ($active) aria-current="page" @endif
    {{ $attributes->merge(['class' => 'text-sm font-semibold transition-colors hover:text-[#1C4937] ' . ($active ? 'text-[#1C4937] underline underline-offset-4' : 'text-[#171717]')]) }}
>
    {{ $slot }}
</a>
