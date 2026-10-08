@props([
    'items' => null,
    'title' => 'FAQ · Réservation & participation',
    'subtitle' => 'Avant de réserver',
    'description' => 'Retrouvez ici les informations utiles pour préparer votre participation.',
])

@php
    // FAQ non administrable pour l'instant (pas de modèle dédié)
    $items ??= [
        [
            'question' => 'Comment confirmer ma réservation ?',
            'answer' => 'Votre confirmation vous est envoyée par mail via un lien, ajoutable à votre calendrier.',
        ],
        [
            'question' => 'Quels sont les horaires et le lieu ?',
            'answer' => 'Les horaires et adresses exactes sont communiqués sur chaque fiche expérience et rappelés par message.',
        ],
        [
            'question' => 'Puis-je annuler ou modifier ma réservation ?',
            'answer' => 'Vous pouvez modifier ou annuler jusqu’à 48h avant le début de l’événement directement par e-mail.',
        ],
        [
            'question' => 'Quels documents ou informations me seront envoyés ?',
            'answer' => 'Une confirmation détaillée avec accès, consignes pratiques et menu indicatif vous sera transmise.',
        ],
    ];
@endphp

<x-layout.section id="faq">
    <div class="flex flex-col gap-8 text-forest">
        <h2 class="text-title font-bold">{{ $title }}</h2>

        <div class="flex flex-col gap-5">
            @if ($subtitle)
                <h3 class="text-subtitle font-bold">{{ $subtitle }}</h3>
            @endif
            @if ($description)
                <p class="text-body-lg">{{ $description }}</p>
            @endif

            <div class="flex flex-col gap-3">
                @foreach ($items as $item)
                    <x-ui.faq-item :question="$item['question']" :answer="$item['answer']" :open="$loop->first" />
                @endforeach
            </div>
        </div>
    </div>
</x-layout.section>
