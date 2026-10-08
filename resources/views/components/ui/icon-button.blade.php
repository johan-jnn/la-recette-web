@props([
    'icon',
    'label',
])

<button
    type="button"
    aria-label="{{ $label }}"
    {{ $attributes->merge(['class' => 'w-10 h-10 rounded-full border border-[#D6D6D6] bg-white text-[#171717] hover:bg-[#F6F4E4] hover:border-[#1C4937] hover:text-[#1C4937] flex items-center justify-center transition-all cursor-pointer focus:outline-none']) }}
>
    <x-ui.icon :name="$icon" />
</button>
