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
        : 'border-line focus:border-sage focus:ring-sage/30';
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
        {{ $attributes->merge(['class' => "w-full px-4 py-3 rounded-field bg-white border text-base text-ink placeholder:text-muted transition-colors focus:outline-none focus:ring-2 {$stateClasses}"]) }}
    />
</x-forms.field>
