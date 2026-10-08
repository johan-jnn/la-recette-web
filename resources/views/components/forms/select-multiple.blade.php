@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => [],
    'placeholder' => 'Sélectionner une ou plusieurs options',
    'disabled' => false,
])

@php
    // Liste ordonnée de paires (un objet JS réordonnerait les clés numériques)
    $optionList = collect($options)->map(fn ($optLabel, $val) => ['value' => (string) $val, 'label' => $optLabel])->values();
    // "experience_ids[]" -> clé "experience_ids" pour old() et les erreurs
    $key = str_replace('[]', '', $name);
    $selectedValues = array_map('strval', array_values((array) old($key, $selected ?? [])));
    $triggerState = $errors->has($key) || $errors->has("{$key}.*") ? 'border-red-500 ring-2 ring-red-500/20' : 'border-[#D6D6D6] hover:border-[#171717]';
@endphp

<x-forms.field
    :name="$key"
    :label="$label"
    class="relative"
    x-data="{
        open: false,
        selected: {{ Js::from($selectedValues) }},
        options: {{ Js::from($optionList) }},
        placeholder: {{ Js::from($placeholder) }},
        labelOf(val) {
            return this.options.find(option => option.value === val)?.label ?? val;
        },
        isSelected(val) {
            return this.selected.includes(String(val));
        },
        toggle(val) {
            this.isSelected(val) ? this.remove(val) : this.selected.push(String(val));
        },
        remove(val) {
            this.selected = this.selected.filter(item => item !== String(val));
        }
    }"
    @click.outside="open = false"
>
    {{-- Un input caché par valeur sélectionnée --}}
    <template x-for="val in selected" :key="val">
        <input type="hidden" name="{{ $name }}" :value="val" @disabled($disabled) />
    </template>

    <div
        role="button"
        tabindex="0"
        @click="open = !open"
        @keydown.enter.prevent="open = !open"
        :aria-expanded="open"
        class="w-full min-h-[46px] px-3 py-2 rounded-xl bg-white border text-sm flex flex-wrap gap-1.5 items-center justify-between cursor-pointer transition-all focus:outline-none focus:ring-2 focus:ring-[#1C4937]/20 {{ $triggerState }}"
    >
        <div class="flex flex-wrap gap-1.5 items-center flex-1">
            <span x-show="selected.length === 0" class="text-[#808080] text-sm px-1" x-text="placeholder"></span>

            <template x-for="val in selected" :key="val">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-[#F6F4E4] text-[#1C4937] border border-[#E8E4D0]">
                    <span x-text="labelOf(val)" class="max-w-[200px] truncate"></span>
                    <button type="button" @click.stop="remove(val)" class="hover:text-black font-bold text-xs leading-none focus:outline-none" aria-label="Retirer">×</button>
                </span>
            </template>
        </div>

        <x-ui.icon name="chevron-down" class="text-[#808080] transition-transform duration-200 shrink-0 ml-2" x-bind:class="open ? 'rotate-180 text-[#1C4937]' : ''" />
    </div>

    <x-forms.dropdown>
        <template x-for="option in options" :key="option.value">
            <div
                @click="toggle(option.value)"
                class="px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center gap-2 hover:bg-[#F6F4E4]/60 text-[#171717]"
                :class="isSelected(option.value) ? 'font-semibold text-[#1C4937] bg-[#F6F4E4]' : ''"
            >
                <span
                    class="w-4 h-4 rounded border flex items-center justify-center text-xs"
                    :class="isSelected(option.value) ? 'bg-[#1C4937] border-[#1C4937] text-white' : 'border-[#D6D6D6] bg-white'"
                >
                    <span x-show="isSelected(option.value)">✓</span>
                </span>
                <span x-text="option.label"></span>
            </div>
        </template>
    </x-forms.dropdown>
</x-forms.field>
