@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => null,
    'placeholder' => 'Sélectionner une option',
    'required' => false,
    'disabled' => false,
])

@php
    // Liste ordonnée de paires (un objet JS réordonnerait les clés numériques)
    $optionList = collect($options)->map(fn ($optLabel, $val) => ['value' => (string) $val, 'label' => $optLabel])->values();
    $currentValue = (string) old($name, $selected);
    $triggerState = $errors->has($name) ? 'border-red-500 ring-2 ring-red-500/20' : 'border-line hover:border-forest';
@endphp

<x-forms.field
    :name="$name"
    :label="$label"
    :for="$name . '_trigger'"
    :required="$required"
    class="relative"
    x-data="{
        open: false,
        value: {{ Js::from($currentValue) }},
        options: {{ Js::from($optionList) }},
        placeholder: {{ Js::from($placeholder) }},
        get displayLabel() {
            return this.options.find(option => option.value === this.value)?.label ?? this.placeholder;
        },
        select(val) {
            this.value = String(val);
            this.open = false;
        }
    }"
    @click.outside="open = false"
>
    {{-- Champ caché soumis avec le formulaire --}}
    <input type="hidden" name="{{ $name }}" :value="value" @disabled($disabled) />

    <button
        type="button"
        id="{{ $name }}_trigger"
        @click="open = !open"
        :aria-expanded="open"
        @disabled($disabled)
        class="w-full px-4 py-3 rounded-field bg-white border text-sm text-left flex justify-between items-center transition-all cursor-pointer focus:outline-none focus:ring-2 focus:ring-sage/30 focus:border-sage {{ $triggerState }}"
    >
        <span x-text="displayLabel" :class="value ? 'text-ink font-medium' : 'text-muted'" class="truncate"></span>
        <x-ui.icon name="chevron-down" class="text-muted transition-transform duration-200 shrink-0 ml-2" x-bind:class="open ? 'rotate-180 text-forest' : ''" />
    </button>

    <x-forms.dropdown>
        @if ($placeholder && !$required)
            <div @click="select('')" class="px-4 py-2.5 text-xs text-muted hover:bg-cream cursor-pointer transition-colors" x-text="placeholder"></div>
        @endif

        <template x-for="option in options" :key="option.value">
            <div
                @click="select(option.value)"
                class="px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between hover:bg-cream text-ink"
                :class="value === option.value ? 'font-semibold text-forest bg-cream' : ''"
            >
                <span x-text="option.label"></span>
                <span x-show="value === option.value" class="text-forest">✓</span>
            </div>
        </template>
    </x-forms.dropdown>
</x-forms.field>
