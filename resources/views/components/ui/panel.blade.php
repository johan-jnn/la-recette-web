@props([
    'padding' => 'p-8 md:p-12',
])

{{-- Panneau blanc mis en avant (formulaires…) --}}
<div {{ $attributes->merge(['class' => "{$padding} rounded-card bg-white"]) }}>
    {{ $slot }}
</div>
