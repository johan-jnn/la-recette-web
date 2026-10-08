@props([
    'items' => null,
    'title' => 'FAQ · Expériences & réservation',
    'subtitle' => 'Avant de réserver',
    'description' => 'Ateliers, food tours ou immersions : tout ce qu’il faut savoir pour préparer votre expérience.',
    'bg' => 'cream',
])

@php
    // FAQ non administrable pour l'instant (pas de modèle dédié)
    $items ??= [
        [
            'question' => 'Comment réserver une expérience ?',
            'answer' => 'En tant que particulier, réservez et payez en ligne depuis la fiche de l’expérience. Pour une entreprise, faites une demande de devis via le formulaire de contact.',
        ],
        [
            'question' => 'Où et combien de temps durent les expériences ?',
            'answer' => 'Dans vos locaux, chez nos partenaires à Lyon ou en immersion chez nos chef·fes et producteur·trices. Comptez 2 h pour un atelier, 3 h pour un food tour et jusqu’à une journée complète pour une immersion.',
        ],
        [
            'question' => 'Proposez-vous des expériences pour les entreprises ?',
            'answer' => 'Oui : teambuildings, séminaires, afterworks ou déjeuners, nos expériences sont clés en main ou conçues sur mesure pour fédérer vos équipes.',
        ],
        [
            'question' => 'Quels produits sont utilisés ?',
            'answer' => 'Tous nos produits sont bruts, locaux, de saison et issus de l’agriculture biologique. Notre matériel et notre vaisselle sont réutilisables et nous valorisons les biodéchets.',
        ],
    ];
@endphp

<x-layout.section id="faq" :bg="$bg">
    <div class="flex flex-col gap-8 text-forest">
        <h2 data-reveal class="text-title font-bold">{{ $title }}</h2>

        <div class="flex flex-col gap-5">
            @if ($subtitle)
                <h3 class="text-subtitle font-bold">{{ $subtitle }}</h3>
            @endif
            @if ($description)
                <p class="text-body-lg">{{ $description }}</p>
            @endif

            <div data-reveal-stagger class="flex flex-col gap-3">
                @foreach ($items as $item)
                    <x-ui.faq-item :question="$item['question']" :answer="$item['answer']" :open="$loop->first" />
                @endforeach
            </div>
        </div>
    </div>
</x-layout.section>
