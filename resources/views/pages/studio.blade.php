@extends('layouts.page')

@section('title', 'Maison La Recette — Studio')
@section('description', 'Sponsoring, production de podcasts audio et vidéo, conférences enregistrées : le studio La recette fait entendre la voix des organisations engagées dans l’alimentation durable.')

@php
    // FAQ spécifique au studio (non administrable pour l'instant)
    $faqItems = [
        [
            'question' => 'À qui s’adresse le studio ?',
            'answer' => 'Aux entreprises, organisations et collectivités engagées dans l’alimentation durable et la gastronomie, qui souhaitent faire entendre leur voix.',
        ],
        [
            'question' => 'Produisez-vous des podcasts en vidéo ?',
            'answer' => 'Oui : nous produisons des podcasts audio et vidéo, de la conception éditoriale à la diffusion.',
        ],
        [
            'question' => 'Comment devenir partenaire du podcast La recette ?',
            'answer' => 'Via un message personnalisé en pré-roll ou un épisode partenaire en lien avec la ligne éditoriale. Décrivez votre projet dans le formulaire ci-dessus.',
        ],
        [
            'question' => 'Comment obtenir un devis ?',
            'answer' => 'Remplissez le formulaire de contact en choisissant « Devis » : nous revenons vers vous pour construire le projet ensemble.',
        ],
    ];
@endphp

@push('main')
    <x-sections.shared.hero-card
        title="Amplifiez votre impact grâce au podcast"
        description="Un studio de production de podcasts qui aide les organisations engagées dans l’alimentation durable à faire entendre leur voix."
        bg="cream"
    >
        <x-slot:decor>
            <x-ui.decor name="on-air" width="307" height="264" class="left-[78.2%] top-[18.5%] w-[307px] h-[264px] hidden lg:block" />
        </x-slot:decor>

        <x-slot:after>
            <x-ui.wave edge="below" />
        </x-slot:after>

        <x-ui.button url="#contact" variant="cream">Nous contacter</x-ui.button>
        <x-ui.button url="#offres">Découvrir nos offres</x-ui.button>
    </x-sections.shared.hero-card>

    <x-sections.studio.offers />
    <x-sections.home.listen variant="plain" :wave="false" />

    <x-sections.shared.contact
        title="Parlons de votre projet"
        description="Sponsoring, production d’un podcast ou enregistrement d’un évènement : décrivez-nous votre projet, nous revenons vers vous avec une proposition sur mesure."
        selected-type="devis"
    />

    <x-sections.home.faq
        :items="$faqItems"
        title="FAQ · Studio"
        subtitle="Avant de vous lancer"
        description="Quelques réponses avant de lancer votre projet."
    />

    <x-sections.home.cta bg="white" tone="sage" fork-side="right" padding="pt-16 md:pt-[72px] pb-32 md:pb-[142px]" quote="Prêt·e à faire entendre votre voix ?" />
@endpush
