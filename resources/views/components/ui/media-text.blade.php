@props([
    'image' => null,
    'imageAlt' => '',
    'eyebrow' => null,
    'title',
    'reverse' => false,
])

{{-- Bloc texte + visuel côte à côte --}}
<div {{ $attributes->merge(['class' => 'grid grid-cols-1 md:grid-cols-2 gap-12 items-center']) }}>
    <div class="space-y-6 text-[#626262] leading-relaxed text-base {{ $reverse ? 'md:order-2' : '' }}">
        <div>
            @if ($eyebrow)
                <x-ui.eyebrow spacing="mb-3">{{ $eyebrow }}</x-ui.eyebrow>
            @endif
            <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight leading-snug">
                {{ $title }}
            </h2>
        </div>

        {{ $slot }}

        @isset($actions)
            <div class="pt-2">{{ $actions }}</div>
        @endisset
    </div>

    <div class="rounded-3xl overflow-hidden shadow-sm aspect-4/3 bg-[#E5E5E5]">
        <x-ui.image :src="$image" :alt="$imageAlt ?: $title" />
    </div>
</div>
