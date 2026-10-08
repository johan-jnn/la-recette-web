@props([
    'items' => null,
    'eyebrow' => 'Avant de réserver',
    'title' => 'FAQ · Réservation & participation',
    'description' => 'Retrouvez ici les informations utiles pour préparer votre participation.',
])

@php
    // FAQ non administrable pour l'instant (pas de modèle dédié)
    $items ??= [
        [
            'question' => 'Comment confirmer ma réservation ?',
            'answer' => 'Modalités de confirmation à préciser. Vous recevrez un email récapitulatif dès la validation.',
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

<x-layout.section width="4xl">
    <x-ui.section-heading :eyebrow="$eyebrow" :title="$title" :description="$description" spacing="mb-10" />

    <div>
        @foreach ($items as $item)
            <x-ui.faq-item :question="$item['question']" :answer="$item['answer']" />
        @endforeach
    </div>
</x-layout.section>
