@extends('layouts.page')

@section('title', 'Maison La Recette — Contact')
@section('description', 'Contactez-nous pour toute question, devis entreprise ou information sur nos ateliers et podcasts.')

@push('main')
    <x-ui.page-hero
        eyebrow="Nous contacter"
        title="Parlons de votre projet"
        description="Une question sur un atelier, une privatisation ou un épisode ? Écrivez-nous et nous vous répondrons rapidement."
    />

    {{-- ?experience={id} pré-sélectionne l'expérience depuis sa fiche --}}
    <x-sections.contact.form :selected-experiences="array_filter([request()->query('experience')])" />

    <x-sections.home.faq />
    <x-sections.home.socials />
@endpush
