@props([
    'eyebrow' => 'Notre mission',
    'title' => 'Accélérer la transition alimentaire',
    'description' => 'Mettre en lumière celles et ceux qui cultivent, fabriquent et cuisinent de façon durable, et donner à chacun·e les clés pour agir.',
    'values' => null,
])

@php
    // Valeurs non administrables pour l'instant
    $values ??= [
        [
            'title' => 'Inspirer',
            'description' => 'Créer des rencontres avec des acteur·ices du changement qui cultivent, fabriquent et cuisinent de façon durable.',
        ],
        [
            'title' => 'Sensibiliser',
            'description' => 'Raconter leurs histoires et mettre en lumière leurs initiatives et leurs pratiques.',
        ],
        [
            'title' => 'Donner le pouvoir d’agir',
            'description' => 'Concevoir des expériences concrètes pour explorer les coulisses et les solutions de notre alimentation.',
        ],
    ];
@endphp

<x-layout.section>
    <x-ui.section-heading :eyebrow="mb_strtoupper($eyebrow)" :title="$title" :description="$description" />

    <div data-reveal-stagger class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($values as $value)
            <x-ui.text-card :title="$value['title']" :description="$value['description']" />
        @endforeach
    </div>
</x-layout.section>
