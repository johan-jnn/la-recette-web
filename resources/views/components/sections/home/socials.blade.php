@props([
    'socials' => null,
    'title' => 'Retrouvons-nous aussi ici',
    'description' => 'Suivez nos actualités et rejoignez la communauté.',
    'align' => 'center',
])

@php
    // Comptes sociaux non administrables pour l'instant
    $socials ??= [
        [
            'network' => 'Instagram',
            'description' => 'Les coulisses du podcast, les moments partagés et les prochaines rencontres.',
            'link_label' => 'Voir Instagram',
            'url' => 'https://instagram.com',
            'note' => 'Compte et lien à renseigner.',
        ],
        [
            'network' => 'LinkedIn',
            'description' => 'Les actualités du projet et les expériences pensées pour les entreprises.',
            'link_label' => 'Voir LinkedIn',
            'url' => 'https://linkedin.com',
            'note' => 'Page et lien à renseigner.',
        ],
    ];
@endphp

<x-layout.section>
    <x-ui.section-heading :title="$title" :description="$description" :align="$align" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($socials as $social)
            <x-ui.text-card
                :title="$social['network']"
                :description="$social['description']"
                :link="['label' => $social['link_label'], 'url' => $social['url'], 'external' => true]"
                :note="$social['note'] ?? null"
            />
        @endforeach
    </div>
</x-layout.section>
