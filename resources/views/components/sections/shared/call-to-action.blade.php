@props([
    'title',
    'description' => null,
    'layout' => 'split', // split (texte à gauche, actions à droite), stacked (actions sous le texte)
    'bg' => 'white',
])

{{-- Bandeau d'appel à l'action : titre, description et boutons (slot) --}}
<x-layout.section :bg="$bg">
    <div data-reveal @class([
        'flex flex-col gap-8 text-forest',
        'md:flex-row md:items-center md:justify-between' => $layout === 'split',
    ])>
        <div class="flex flex-col gap-5 max-w-3xl">
            <h2 class="text-title font-bold">{{ $title }}</h2>
            @if ($description)
                <p class="text-body-lg">{{ $description }}</p>
            @endif
        </div>

        <div @class(['flex flex-wrap gap-4', 'md:flex-col md:items-start md:w-[420px] md:shrink-0' => $layout === 'split'])>
            {{ $slot }}
        </div>
    </div>
</x-layout.section>
