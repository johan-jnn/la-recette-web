@extends('layouts.page')

@section('title', 'Maison La Recette — Contact')
@section('description', 'Une question sur le podcast, un projet de production, une expérience à réserver ou un devis pour votre équipe ? Écrivez à Maison la recette.')

@php
    // FAQ spécifique à la page contact (non administrable pour l'instant)
    $faqItems = [
        [
            'question' => 'Vous souhaitez produire un podcast ?',
            'answer' => 'Le studio La recette accompagne les organisations engagées dans l’alimentation durable de l’idée à la diffusion : conception éditoriale, enregistrement, montage, diffusion et communication. Choisissez « Devis » comme objet de votre demande.',
        ],
        [
            'question' => 'Comment écouter les épisodes du podcast ?',
            'answer' => 'Un nouvel épisode paraît chaque mois. Tous les épisodes sont disponibles sur la page Podcast et sur vos plateformes d’écoute habituelles.',
        ],
        [
            'question' => 'Quel est le processus pour un projet d’entreprise ?',
            'answer' => 'Choisissez « Devis » comme objet de votre demande et décrivez votre équipe, votre évènement (teambuilding, séminaire, afterwork, déjeuner) et vos envies : nous revenons vers vous pour construire l’expérience ensemble.',
        ],
        [
            'question' => 'Où trouver les prochaines expériences ?',
            'answer' => 'Ateliers, food tours et immersions sont présentés sur la page Expériences, avec leurs modalités de réservation en ligne.',
        ],
    ];
@endphp

@push('main')
    <x-sections.shared.hero-card
        title="Faisons connaissance"
        description="Une question sur le podcast, un projet de production, une expérience à réserver ou un devis pour votre équipe ? Écrivez à Maison la recette."
    >
        <x-ui.button url="#contact">Écrire un message</x-ui.button>
        <x-ui.button :url="route('experiences.index')" variant="rose">Découvrir les expériences</x-ui.button>
    </x-sections.shared.hero-card>

    <x-sections.contact.topics />

    {{-- ?experience={id} et ?type={ContactType} pré-remplissent le formulaire --}}
    <x-sections.shared.contact
        description="Utilisez ce formulaire pour une question sur le podcast, une demande de devis pour le studio ou une expérience, ou une réservation."
        :selected-experiences="array_filter([request()->query('experience')])"
        :selected-type="request()->query('type')"
        wave-bottom
    />

    <x-sections.home.socials />

    <x-sections.home.faq
        :items="$faqItems"
        title="FAQ"
        subtitle="Avant de nous écrire"
        description="Quelques réponses utiles avant d’envoyer votre message."
    />
@endpush
