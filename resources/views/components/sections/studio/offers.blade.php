@props([
    'title' => 'Nos offres',
    'description' => 'Trois façons de faire entendre votre voix auprès d’une communauté engagée pour une alimentation durable.',
    'offers' => null,
])

@php
    // Offres du studio non administrables pour l'instant
    $offers ??= [
        [
            'title' => 'Sponsoring',
            'items' => [
                'Message personnalisé diffusé en pré-roll de l’épisode.',
                'Épisode partenaire en lien avec la ligne éditoriale du podcast.',
            ],
        ],
        [
            'title' => 'Studio de production',
            'items' => [
                'Production de podcasts audio et vidéo, de l’idée à la diffusion.',
                'Conception éditoriale, enregistrement, montage, diffusion et communication.',
            ],
        ],
        [
            'title' => 'Évènement',
            'items' => [
                'Création, animation et enregistrement d’une conférence ou d’une table ronde.',
                'Lors d’un de vos évènements autour de l’alimentation et de la gastronomie.',
            ],
        ],
    ];
@endphp

<x-layout.section bg="white" id="offres">
    <x-ui.section-heading :title="$title" :description="$description" />

    <div data-reveal-stagger class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($offers as $offer)
            <x-ui.offer-card :number="str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)" :title="$offer['title']" :items="$offer['items']" />
        @endforeach
    </div>
</x-layout.section>
