@props([
    'tone' => 'muted', // muted, light
    'spacing' => 'mb-2',
])

<span {{ $attributes->merge(['class' => "text-xs uppercase tracking-widest font-semibold block {$spacing} " . ($tone === 'light' ? 'text-[#C8C8C8]' : 'text-[#808080]')]) }}>
    {{ $slot }}
</span>
