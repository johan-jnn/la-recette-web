@props([
    'url',
    'icon',
    'label',
])

<a
    href="{{ $url }}"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="{{ $label }}"
    {{ $attributes->merge(['class' => 'w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors']) }}
>
    <x-ui.icon :name="$icon" />
</a>
