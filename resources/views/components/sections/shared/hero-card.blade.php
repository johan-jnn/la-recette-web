@props([
    'title',
    'description' => null,
    'bg' => 'white', // fond de la section : cream, white, forest
    'tone' => 'forest', // fond de la carte : forest, cream, sage
    'padding' => 'py-16 md:py-[100px]',
])

{{-- En-tête de page : carte centrée (titre h1, chapeau, actions). Slots : "decor" (dans la carte), "after" (bas de section, ex. vague) --}}
<x-layout.section :bg="$bg" :padding="$padding">
    <x-slot:decor>{{ $after ?? '' }}</x-slot:decor>

    <x-ui.quote-card :quote="$title" :description="$description" :tone="$tone" tag="h1">
        <x-slot:decor>{{ $decor ?? '' }}</x-slot:decor>

        {{ $slot }}
    </x-ui.quote-card>
</x-layout.section>
