@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => [],
    'placeholder' => 'Sélectionner des expériences',
    'disabled' => false,
])

@php
    $selectedValues = old(str_replace('[]', '', $name), $selected ?? []);
    if (!is_array($selectedValues)) {
        $selectedValues = [$selectedValues];
    }
    // Encode to JSON for Alpine safely
    $initialSelectedJson = json_encode(array_values($selectedValues));
@endphp

<div
    class="flex flex-col gap-1.5 w-full relative"
    x-data="{
        open: false,
        selected: {{ $initialSelectedJson }},
        options: {{ json_encode($options) }},
        placeholder: '{{ $placeholder }}',
        toggle(val) {
            val = String(val);
            if (this.selected.includes(val)) {
                this.selected = this.selected.filter(item => item !== val);
            } else {
                this.selected.push(val);
            }
        },
        isSelected(val) {
            return this.selected.includes(String(val));
        },
        remove(val) {
            this.selected = this.selected.filter(item => item !== String(val));
        }
    }"
    @click.outside="open = false"
>
    @if ($label)
        <label class="text-sm font-medium text-[#171717]">
            {{ $label }}
        </label>
    @endif

    {{-- Inputs cachés pour chaque valeur sélectionnée pour Laravel --}}
    <template x-for="val in selected" :key="val">
        <input type="hidden" name="{{ $name }}" :value="val">
    </template>

    {{-- Déclencheur custom avec tags/badges --}}
    <div
        @click="open = !open"
        :aria-expanded="open"
        class="w-full min-h-[46px] px-3 py-2 rounded-xl bg-white border text-sm flex flex-wrap gap-1.5 items-center justify-between cursor-pointer transition-all focus-within:ring-2 focus-within:ring-[#1C4937]/20 focus-within:border-[#1C4937] {{ $errors->has(str_replace('[]', '', $name)) ? 'border-red-500 ring-2 ring-red-500/20' : 'border-[#D6D6D6] hover:border-[#171717]' }}"
    >
        <div class="flex flex-wrap gap-1.5 items-center flex-1">
            <template x-if="selected.length === 0">
                <span class="text-[#808080] text-sm px-1" x-text="placeholder"></span>
            </template>

            <template x-for="val in selected" :key="val">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-[#F6F4E4] text-[#1C4937] border border-[#E8E4D0]">
                    <span x-text="options[val] || val" class="max-w-[200px] truncate"></span>
                    <button
                        type="button"
                        @click.stop="remove(val)"
                        class="hover:text-black font-bold text-xs leading-none focus:outline-none"
                    >
                        ×
                    </button>
                </span>
            </template>
        </div>

        <svg
            class="w-4 h-4 text-[#808080] transition-transform duration-200 shrink-0 ml-2"
            :class="open ? 'rotate-180 text-[#1C4937]' : ''"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </div>

    {{-- Dropdown options multiples --}}
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
        <template x-for="(label, val) in options" :key="val">
            <div
                @click="toggle(val)"
                class="px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between hover:bg-[#F6F4E4]/60 text-[#171717]"
                :class="isSelected(val) ? 'font-semibold text-[#1C4937] bg-[#F6F4E4]' : ''"
            >
                <div class="flex items-center gap-2">
                    <span
                        class="w-4 h-4 rounded border flex items-center justify-center text-xs"
                        :class="isSelected(val) ? 'bg-[#1C4937] border-[#1C4937] text-white' : 'border-[#D6D6D6] bg-white'"
                    >
                        <span x-show="isSelected(val)">✓</span>
                    </span>
                    <span x-text="label"></span>
                </div>
            </div>
        </template>
    </div>

    @error(str_replace('[]', '', $name))
        <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>
