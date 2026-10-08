@props([
    'image' => null,
    'imageAlt' => '',
    'eyebrow' => null,
    'title',
    'tone' => 'forest', // forest, light
    'reverse' => false,
    'imageClass' => 'h-[340px] rounded-image',
])

{{-- Bloc texte + visuel côte à côte (sections "Bienvenue", "Offres podcast"…) --}}
<div {{ $attributes->merge(['class' => 'relative grid grid-cols-1 md:grid-cols-2 gap-8 items-start']) }}>
    <div class="flex flex-col gap-5 items-start {{ $tone === 'light' ? 'text-white' : 'text-forest' }} {{ $reverse ? 'md:order-2' : '' }}">
        @if ($eyebrow)
            <x-ui.eyebrow :tone="$tone">{{ $eyebrow }}</x-ui.eyebrow>
        @endif

        <h2 class="text-title font-bold">{{ $title }}</h2>

        <div class="flex flex-col gap-5 text-body-lg">
            {{ $slot }}
        </div>

        @isset($actions)
            <div class="flex flex-wrap items-center gap-6">{{ $actions }}</div>
        @endisset
    </div>

    <x-ui.media :src="$image" :alt="$imageAlt ?: $title" radius="" class="w-full {{ $imageClass }}" />
</div>
