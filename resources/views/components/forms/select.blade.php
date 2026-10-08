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
    $currentValue = old($name, $selected);
    $currentLabel = $placeholder;
    if ($currentValue && isset($options[$currentValue])) {
        $currentLabel = $options[$currentValue];
    }
@endphp

<div
    class="flex flex-col gap-1.5 w-full relative"
    x-data="{
        open: false,
        value: '{{ $currentValue }}',
        displayLabel: '{{ $currentLabel }}',
        placeholder: '{{ $placeholder }}',
        selectOption(val, text) {
            this.value = val;
            this.displayLabel = text;
            this.open = false;
        }
    }"
    @click.outside="open = false"
>
    @if ($label)
        <label for="{{ $name }}" class="text-sm font-medium text-[#171717]">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    {{-- Champ caché soumis avec le formulaire --}}
    <input
        type="hidden"
        id="{{ $name }}"
        name="{{ $name }}"
        :value="value"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
    />

    {{-- Bouton déclencheur custom --}}
    <button
        type="button"
        @click="open = !open"
        :aria-expanded="open"
        {{ $disabled ? 'disabled' : '' }}
        class="w-full px-4 py-3 rounded-xl bg-white border text-sm text-left flex justify-between items-center transition-all cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#1C4937]/20 focus:border-[#1C4937] {{ $errors->has($name) ? 'border-red-500 ring-2 ring-red-500/20' : 'border-[#D6D6D6] hover:border-[#171717]' }}"
    >
        <span
            x-text="displayLabel"
            :class="value ? 'text-[#171717] font-medium' : 'text-[#808080]'"
            class="truncate"
        ></span>

        <svg
            class="w-4 h-4 text-[#808080] transition-transform duration-200 shrink-0 ml-2"
            :class="open ? 'rotate-180 text-[#1C4937]' : ''"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    {{-- Dropdown custom --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute left-0 top-full mt-1.5 w-full bg-white rounded-xl border border-[#E5E5E5] shadow-lg z-30 max-h-60 overflow-y-auto py-1"
        style="display: none;"
    >
        @if ($placeholder)
            <div
                @click="selectOption('', placeholder)"
                class="px-4 py-2.5 text-xs text-[#808080] hover:bg-[#F9F9FB] cursor-pointer transition-colors"
            >
                {{ $placeholder }}
            </div>
        @endif

        @foreach ($options as $val => $optLabel)
            <div
                @click="selectOption('{{ $val }}', '{{ addslashes($optLabel) }}')"
                class="px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between hover:bg-[#F6F4E4]/60 text-[#171717]"
                :class="value == '{{ $val }}' ? 'font-semibold text-[#1C4937] bg-[#F6F4E4]' : ''"
            >
                <span>{{ $optLabel }}</span>
                <span x-show="value == '{{ $val }}'" class="text-[#1C4937]">✓</span>
            </div>
        @endforeach
    </div>

    @error($name)
        <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>
