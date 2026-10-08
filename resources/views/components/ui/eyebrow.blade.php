@props([
    'tone' => 'forest', // forest, light
])

<p {{ $attributes->merge(['class' => 'text-sm leading-normal ' . ($tone === 'light' ? 'text-white' : 'text-forest')]) }}>
    {{ $slot }}
</p>
