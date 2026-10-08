@props([
    'name',
    'type' => 'text',
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'tone' => 'light', // light, dark (sur fond vert foncé)
])

@php
    // Styles de base dans resources/css/components/forms.css
    $base = $tone === 'dark' ? 'field-input-dark' : 'field-input';
    $state = $errors->has($name)
        ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20'
        : ($tone === 'dark' ? 'border-line-soft focus:ring-sage' : 'border-line focus:border-sage focus:ring-sage/30');
@endphp

<x-forms.field :name="$name" :label="$label" :for="$name" :required="$required" :tone="$tone">
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        @disabled($disabled)
        {{ $attributes->merge(['class' => "{$base} {$state}"]) }}
    />
</x-forms.field>
