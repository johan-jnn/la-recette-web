@props([
    'title',
    'description' => null,
    'link' => null, // ['label' => ..., 'url' => ..., 'external' => bool]
    'note' => null,
])

{{-- Carte textuelle : titre, description, lien et note optionnels --}}
<div {{ $attributes->merge(['class' => 'p-8 rounded-card bg-white flex flex-col justify-between gap-6']) }}>
    <div class="flex flex-col gap-4">
        <h3 class="text-subtitle font-bold text-forest">{{ $title }}</h3>
        @if ($description)
            <p class="text-base leading-[1.55] text-muted">{{ $description }}</p>
        @endif
    </div>

    @if ($link)
        <div class="flex flex-col gap-2 items-start">
            <x-ui.button :url="$link['url']" :external="$link['external'] ?? false" variant="outline">
                {{ $link['label'] }}
                @if (!empty($link['external']))
                    <x-ui.icon name="arrow-up-right" size="w-3 h-3" />
                @endif
            </x-ui.button>
            @if ($note)
                <p class="text-sm text-muted">{{ $note }}</p>
            @endif
        </div>
    @endif
</div>
