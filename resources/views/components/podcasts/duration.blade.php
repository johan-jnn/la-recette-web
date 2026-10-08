@props([
    'value' => null, // "HH:MM:SS" (TimePicker Filament)
])

@php
    $label = null;
    if (filled($value)) {
        [$hours, $minutes] = array_map('intval', array_pad(explode(':', $value), 2, 0));
        $label = $hours > 0 ? sprintf('%d h %02d', $hours, $minutes) : "{$minutes} min";
    }
@endphp

@if ($label)
    <span {{ $attributes->merge(['class' => 'inline-flex items-center gap-1']) }}>
        <x-ui.icon name="clock" size="w-3.5 h-3.5" />
        {{ $label }}
    </span>
@endif
