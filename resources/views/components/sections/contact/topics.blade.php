@props([
    'eyebrow' => 'Une envie, un projet',
    'title' => 'De quoi souhaitez-vous parler ?',
    'note' => 'Une autre question ? Choisissez « Autre » dans le formulaire et racontez-nous.',
    'topics' => null,
])

@php
    // Sujets de prise de contact non administrables pour l'instant
    $topics ??= [
        [
            'title' => 'Le podcast',
            'description' => 'Proposer un parcours, un savoir-faire ou une personne à rencontrer, ou poser une question sur un épisode.',
            'tone' => 'forest',
        ],
        [
            'title' => 'Les expériences',
            'description' => 'Réserver un atelier, un food tour ou une immersion, ou imaginer un moment sur mesure pour votre équipe.',
            'tone' => 'cream',
        ],
        [
            'title' => 'Le studio',
            'description' => 'Produire un podcast, devenir partenaire du podcast ou enregistrer une conférence lors de votre évènement.',
            'tone' => 'forest',
        ],
    ];
@endphp

{{-- Orientation avant le formulaire : trois sujets de demande --}}
<x-layout.section bg="white" padding="pt-8 md:pt-[60px] pb-16 md:pb-[185px]">
    <x-ui.section-heading :eyebrow="mb_strtoupper($eyebrow)" :title="$title" eyebrow-tone="rose" />

    <div data-reveal-stagger class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($topics as $topic)
            <x-ui.text-card :title="$topic['title']" :description="$topic['description']" :tone="$topic['tone']" class="md:min-h-[258px] justify-start!" />
        @endforeach
    </div>

    <p data-reveal class="mt-5 text-sm leading-[1.55] text-forest">{{ $note }}</p>
</x-layout.section>
