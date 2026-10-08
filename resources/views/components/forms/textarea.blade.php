@props([
    'name',
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'rows' => 4,
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

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 rounded-xl bg-white border text-sm text-[#171717] placeholder:text-[#808080] transition-colors resize-y focus:outline-none focus:ring-2 focus:ring-[#171717]/20 focus:border-[#171717] ' . ($errors->has($name) ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20' : 'border-[#D6D6D6]')
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>
