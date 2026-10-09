@props([
    'options' => [], // [valeur => libellé]
    'param' => 'sort',
    'default' => null,
    'label' => 'Trier :',
])

@php
    $current = request()->query($param, $default ?? array_key_first($options));
@endphp

{{-- Menu de tri : liens conservant les autres paramètres de la requête --}}
<div {{ $attributes->merge(['class' => 'relative']) }} x-data="{ open: false }" @click.outside="open = false">
    <button type="button" @click="open = !open" :aria-expanded="open" class="inline-flex items-center gap-2 text-sm font-semibold text-forest underline underline-offset-4 cursor-pointer">
        {{ $label }} {{ mb_strtolower($options[$current] ?? '') }}
        <x-ui.icon name="chevron-down" class="transition-transform" x-bind:class="open ? 'rotate-180' : ''" />
    </button>

    <x-forms.dropdown position="right-0 w-56">
        @foreach ($options as $value => $optionLabel)
            <a
                href="{{ request()->fullUrlWithQuery([$param => $value, 'page' => null]) }}"
                @class([
                    'block px-4 py-2.5 text-sm transition-colors hover:bg-cream',
                    'font-semibold text-forest bg-cream' => (string) $value === (string) $current,
                    'text-ink' => (string) $value !== (string) $current,
                ])
            >
                {{ $optionLabel }}
            </a>
        @endforeach
    </x-forms.dropdown>
</div>
