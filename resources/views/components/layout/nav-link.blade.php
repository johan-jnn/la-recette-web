@props([
    'url',
    'active' => false,
])

<a
    href="{{ $url }}"
    @if ($active) aria-current="page" @endif
    {{ $attributes->merge(['class' => 'text-base font-semibold text-forest whitespace-nowrap transition-colors hover:text-sage ' . ($active ? 'underline underline-offset-8 decoration-2 decoration-sage' : '')]) }}
>
    {{ $slot }}
</a>
