@props([
    'title',
    'description' => null,
    'link' => null, // ['label' => ..., 'url' => ..., 'external' => bool]
    'note' => null,
])

{{-- Carte textuelle simple : titre, description, lien et note optionnels --}}
<div {{ $attributes->merge(['class' => 'p-8 rounded-2xl bg-white border border-[#E5E5E5] flex flex-col justify-between gap-6 hover:shadow-md transition-shadow']) }}>
    <div>
        <h3 class="text-xl font-bold text-[#171717] mb-3">{{ $title }}</h3>
        @if ($description)
            <p class="text-sm text-[#626262] leading-relaxed">{{ $description }}</p>
        @endif
    </div>

    @if ($link)
        <div>
            <x-ui.text-link :url="$link['url']" :external="$link['external'] ?? false" tone="dark">
                {{ $link['label'] }}
            </x-ui.text-link>
            @if ($note)
                <p class="text-xs text-[#808080] mt-1">{{ $note }}</p>
            @endif
        </div>
    @endif
</div>
