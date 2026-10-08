@props([
    'eyebrow' => 'Mission & valeurs',
    'title' => 'Créer du lien par la cuisine',
    'description' => 'Mettre les personnes et leurs savoir-faire au cœur du récit, puis faire de la table un lieu de découverte et de partage.',
    'values' => null,
])

@php
    // Valeurs non administrables pour l'instant
    $values ??= [
        [
            'title' => 'La curiosité',
            'description' => 'Écouter des parcours singuliers et découvrir ce qui se cache derrière un produit, un geste ou un plat.',
        ],
        [
            'title' => 'La transmission',
            'description' => 'Donner une place aux savoir-faire, aux souvenirs et aux recettes qui passent d’une personne à l’autre.',
        ],
        [
            'title' => 'Le partage',
            'description' => 'Favoriser des rencontres où chacun peut apprendre, participer et nourrir la conversation.',
        ],
    ];
@endphp

<x-layout.section>
    <x-ui.section-heading :eyebrow="mb_strtoupper($eyebrow)" :title="$title" :description="$description" />

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($values as $value)
            <x-ui.text-card :title="$value['title']" :description="$value['description']" />
        @endforeach
    </div>
</x-layout.section>
