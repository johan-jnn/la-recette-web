@props([
    'for' => null,
    'required' => false,
    'tone' => 'light', // light, dark (sur fond vert foncé)
])

<label @if ($for) for="{{ $for }}" @endif {{ $attributes->merge(['class' => $tone === 'dark' ? 'text-base text-cream' : 'text-base font-semibold text-forest']) }}>
    {{ $slot }}
    @if ($required && $tone !== 'dark')
        <span class="text-red-500">*</span>
    @endif
</label>
