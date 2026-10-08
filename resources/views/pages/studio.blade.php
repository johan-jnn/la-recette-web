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
    <x-ui.page-hero
        :breadcrumb="[['label' => 'Studio']]"
        title="Amplifiez votre impact grâce au podcast"
        description="Un studio de production de podcasts qui aide les organisations engagées dans l’alimentation durable à faire entendre leur voix."
    >
        <div class="flex flex-wrap gap-4">
            <x-ui.button url="#contact">Demander un devis</x-ui.button>
            <x-ui.button url="#offres" variant="outline">Découvrir nos offres</x-ui.button>
        </div>
    </x-ui.page-hero>

    <x-sections.studio.offers />
    <x-sections.studio.stats />
    <x-sections.home.listen title="Écoutez notre savoir-faire" />
    <x-sections.studio.expertise />
    <x-sections.studio.events />

    <x-sections.experiences.contact
        title="Parlons de votre projet"
        description="Sponsoring, production d’un podcast ou enregistrement d’un évènement : décrivez-nous votre projet, nous revenons vers vous avec une proposition sur mesure."
        selected-type="devis"
    />

    <x-sections.home.faq
        :items="$faqItems"
        title="FAQ · Studio"
        subtitle=""
        description="Quelques réponses avant de lancer votre projet."
        bg="white"
    />
@endpush
