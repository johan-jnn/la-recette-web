@props([
    'title' => 'Nos partenaires',
    'description' => 'Toutes nos expériences sont co-construites avec des professionnel·les de l’alimentation et de la gastronomie durable.',
    'members' => null,
])

@php
    // Partenaires non administrables pour l'instant
    $members ??= [
        ['role' => 'Chef·fes', 'bio' => 'Des chef·fes engagé·es qui partagent leurs techniques culinaires, du bocal lactofermenté à la cuisine anti-gaspi.', 'image' => asset('images/about/partenaire-cheffe.jpg')],
        ['role' => 'Producteur·trices', 'bio' => 'Des producteur·trices locaux qui ouvrent leur ferme : semer, planter, récolter au rythme des saisons.', 'image' => asset('images/about/partenaire-producteur.jpg')],
        ['role' => 'Artisan·es', 'bio' => 'Des artisan·es passionné·es qui réinventent la gastronomie de quartier et transmettent leur savoir-faire.', 'image' => asset('images/about/partenaire-artisan.jpg')],
    ];
@endphp

<x-layout.section>
    <x-ui.section-heading :title="$title" :description="$description" />

    <div data-reveal-stagger class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($members as $member)
            <x-ui.profile-card :image="$member['image']" :title="$member['role']" :description="$member['bio']" />
        @endforeach
    </div>
</x-layout.section>
