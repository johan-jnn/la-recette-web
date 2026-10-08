@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => null,
    'placeholder' => 'Sélectionner une option',
    'required' => false,
    'disabled' => false,
])

<div class="flex flex-col gap-1.5 w-full">
    @if ($label)
        <label for="{{ $name }}" class="text-sm font-medium text-[#171717]">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 rounded-xl bg-white border text-sm text-[#171717] transition-colors focus:outline-none focus:ring-2 focus:ring-[#171717]/20 focus:border-[#171717] ' . ($errors->has($name) ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20' : 'border-[#D6D6D6]')
        ]) }}
    >
        @if ($placeholder)
            <option value="" disabled {{ old($name, $selected) ? '' : 'selected' }}>
                {{ $placeholder }}
            </option>
        @endif

        @foreach ($options as $val => $optLabel)
            <option value="{{ $val }}" {{ old($name, $selected) == $val ? 'selected' : '' }}>
                {{ $optLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>
