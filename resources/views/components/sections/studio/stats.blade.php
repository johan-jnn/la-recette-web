@props([
    'eyebrow' => 'Le podcast La recette',
    'title' => 'Une audience fidèle et engagée',
    'stats' => null,
])

@php
    // Chiffres du podcast (plaquette commerciale), non administrables pour l'instant
    $stats ??= [
        ['value' => '4,9/5', 'label' => 'Note sur les plateformes d’écoute (70 avis)'],
        ['value' => '75 %', 'label' => 'De chaque épisode écouté en moyenne'],
        ['value' => '+ 50 000', 'label' => 'Écoutes, soit 2 500 par épisode'],
        ['value' => '+ 40', 'label' => 'Épisodes et invité·es'],
    ];
@endphp

<x-layout.section bg="forest" class="overflow-hidden">
    <x-slot:decor>
        <x-ui.decor name="leaf-dark" width="474" height="414" class="left-[73.75%] top-[40px] w-[474px] h-[414px] hidden md:block" />
    </x-slot:decor>

    <x-ui.section-heading :eyebrow="mb_strtoupper($eyebrow)" :title="$title" tone="light" spacing="mb-12" />

    <div data-reveal-stagger class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ($stats as $stat)
            <x-ui.stat :value="$stat['value']" :label="$stat['label']" tone="light" />
        @endforeach
    </div>
</x-layout.section>
