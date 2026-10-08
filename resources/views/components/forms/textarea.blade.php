@props([
    'name',
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'rows' => 4,
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
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        @disabled($disabled)
        {{ $attributes->merge(['class' => "{$base} {$state} resize-y"]) }}
    >{{ old($name, $value) }}</textarea>
</x-forms.field>
