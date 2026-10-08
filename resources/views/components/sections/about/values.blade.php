@props([
    'values' => null,
])

@php
    // Valeurs non administrables pour l'instant
    $values ??= [
        [
            'title' => 'L’Amour du Vivant & du Goût',
            'description' => 'Valoriser le travail minutieux des agriculteurs, vignerons et artisans qui préservent la richesse de nos terroirs.',
        ],
        [
            'title' => 'La Transmission & le Partage',
            'description' => 'Démystifier les savoir-faire culinaires par des formats accessibles, pédagogiques et chaleureux.',
        ],
        [
            'title' => 'L’Immersion & la Convivialité',
            'description' => 'Créer de véritables moments d’échange autour d’une table généreuse où chaque bouchée raconte une histoire.',
        ],
    ];
@endphp

<x-layout.section>
    <x-ui.section-heading eyebrow="Ce qui nous anime" title="Nos piliers fondateurs" align="center" />

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($values as $value)
            <x-ui.text-card :title="$value['title']" :description="$value['description']" />
        @endforeach
    </div>
</x-layout.section>
