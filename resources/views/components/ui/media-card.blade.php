@props([
    'image' => null,
    'imageAlt' => '',
    'imageClass' => 'h-52',
    'badge' => null,
    'meta' => null,
    'title',
    'description' => null,
    'tone' => 'white',
])

{{-- Carte avec visuel, méta (date…), titre, extrait et pied (slot "footer") --}}
<x-ui.card :tone="$tone" {{ $attributes }}>
    <div class="w-full {{ $imageClass }} bg-[#E5E5E5] overflow-hidden relative shrink-0">
        <x-ui.image :src="$image" :alt="$imageAlt ?: $title" class="group-hover:scale-105 transition-transform duration-300" />

        @if ($badge)
            <x-ui.badge class="absolute top-4 left-4">{{ $badge }}</x-ui.badge>
        @endif
    </div>

    <div class="p-6 flex flex-col flex-1 justify-between gap-6">
        <div>
            @if ($meta)
                <span class="text-xs text-[#808080] block mb-2">{{ $meta }}</span>
            @endif

            <h3 class="text-lg font-bold text-[#171717] mb-2 line-clamp-2 leading-snug">
                {{ $title }}
            </h3>

            @if ($description)
                <p class="text-sm text-[#626262] line-clamp-3 leading-relaxed">
                    {{ $description }}
                </p>
            @endif
        </div>

        @isset($footer)
            <div {{ $footer->attributes->merge(['class' => 'flex items-center gap-4']) }}>
                {{ $footer }}
            </div>
        @endisset
    </div>
</x-ui.card>
