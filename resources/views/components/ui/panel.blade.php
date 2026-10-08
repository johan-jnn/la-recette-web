@props([
    'padding' => 'p-8 md:p-12',
])

{{-- Panneau blanc mis en avant (formulaires…) --}}
<div {{ $attributes->merge(['class' => "{$padding} rounded-3xl bg-white border border-[#E5E5E5] shadow-sm"]) }}>
    {{ $slot }}
</div>
