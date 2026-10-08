@props([
    'items' => [],
])

@php
    // Si aucune liste d'items n'est passée, mock des questions issues de Figma (conforme REFERENCE.md)
    if (empty($items)) {
        $items = [
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
    }
@endphp

<section class="w-full py-20 px-6 md:px-16 bg-white">
    <div class="max-w-4xl mx-auto">
        <div class="mb-10 text-center md:text-left">
            <span class="text-xs uppercase tracking-widest font-semibold text-[#808080] block mb-2">
                Avant de réserver
            </span>
            <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight mb-3">
                FAQ · Réservation & participation
            </h2>
            <p class="text-base text-[#626262]">
                Retrouvez ici les informations utiles pour préparer votre participation.
            </p>
        </div>

        <div class="divide-y divide-transparent">
            @foreach ($items as $item)
                <x-ui.faq-item
                    :question="$item['question']"
                    :answer="$item['answer']"
                />
            @endforeach
        </div>
    </div>
</section>
