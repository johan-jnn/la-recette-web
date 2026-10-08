@props([
    'for' => null,
    'required' => false,
])

<label @if ($for) for="{{ $for }}" @endif {{ $attributes->merge(['class' => 'text-base font-semibold text-forest']) }}>
    {{ $slot }}
    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>
