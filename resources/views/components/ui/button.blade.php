@props([
    'url' => null,
    'variant' => 'primary', // primary, secondary, outline, light, pill
    'type' => 'button',
    'extraClass' => '',
    'label' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium text-sm transition-all duration-200 cursor-pointer text-center';

    $variantClasses = match($variant) {
        'primary' => 'bg-[#171717] text-white hover:bg-black rounded-full px-6 py-3',
        'secondary' => 'bg-[#F3F3F3] text-[#171717] hover:bg-[#E5E5E5] rounded-full px-6 py-3',
        'outline' => 'bg-transparent text-[#171717] border border-[#171717] hover:bg-[#171717] hover:text-white rounded-full px-6 py-3',
        'outline-white' => 'bg-transparent text-white border border-white hover:bg-white hover:text-[#171717] rounded-full px-6 py-3',
        'pill' => 'bg-white text-[#171717] border border-[#C8C8C8] hover:border-[#171717] rounded-full px-5 py-2.5',
        'light' => 'bg-white text-[#171717] hover:bg-gray-100 rounded-full px-6 py-3 shadow-sm',
        default => 'bg-[#171717] text-white hover:bg-black rounded-full px-6 py-3',
    };

    $classes = "{$baseClasses} {$variantClasses} {$extraClass}";
@endphp

@if ($url)
    <a href="{{ $url }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $label ?? $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $label ?? $slot }}
    </button>
@endif
