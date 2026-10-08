@props([
    'name',
    'type' => 'text',
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
])

@php
    $stateClasses = $errors->has($name)
        ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20'
        : 'border-[#D6D6D6] focus:border-[#171717] focus:ring-[#171717]/20';
@endphp

<x-forms.field :name="$name" :label="$label" :for="$name" :required="$required">
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        @disabled($disabled)
        {{ $attributes->merge(['class' => "w-full px-4 py-3 rounded-xl bg-white border text-sm text-[#171717] placeholder:text-[#808080] transition-colors focus:outline-none focus:ring-2 {$stateClasses}"]) }}
    />
</x-forms.field>
