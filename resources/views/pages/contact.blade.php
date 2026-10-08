@extends('layouts.page')

@section('title', 'Maison La Recette — Contact')
@section('description', 'Une question, une idée de rencontre ou une envie de collaboration ? Écrivez à Maison la recette.')

@php
    // FAQ spécifique à la page contact (non administrable pour l'instant)
    $faqItems = [
        [
            'question' => 'Comment envoyer une demande générale ?',
            'answer' => 'Utilisez le formulaire ci-dessus pour nous transmettre votre prénom, nom, adresse e-mail et le détail de votre demande.',
        ],
        [
            'question' => 'Comment écouter les épisodes du podcast ?',
            'answer' => 'Tous les épisodes sont disponibles sur la page Podcast et sur vos plateformes d’écoute habituelles.',
        ],
        [
            'question' => 'Quel est le processus pour un projet d’entreprise ?',
            'answer' => 'Choisissez « Devis » comme objet de votre demande et décrivez votre équipe et vos envies : nous revenons vers vous pour construire le moment ensemble.',
        ],
        [
            'question' => 'Où trouver les prochaines expériences ?',
            'answer' => 'Les expériences à venir sont présentées sur la page Expériences, avec leurs modalités de réservation.',
        ],
    ];
@endphp

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'Contact']]"
        title="Faisons connaissance"
        description="Une question, une idée de rencontre ou une envie de collaboration ? Écrivez à Maison la recette."
    />

    {{-- ?experience={id} et ?type={ContactType} pré-remplissent le formulaire --}}
    <x-sections.contact.form
        :selected-experiences="array_filter([request()->query('experience')])"
        :selected-type="request()->query('type')"
    />

    <x-sections.home.socials description="" align="left" />

    <x-sections.home.faq
        :items="$faqItems"
        title="FAQ"
        subtitle=""
        description="Quelques réponses utiles avant d’envoyer votre message."
        bg="white"
    />
@endpush
