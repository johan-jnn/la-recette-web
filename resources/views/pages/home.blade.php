@extends('layouts.page')

@section('title', 'Maison La Recette — Accueil')
@section('description', 'Des histoires de celles et ceux qui font la cuisine, et des expériences pour se rencontrer autour de la table.')

@section('main')
    {{-- Section 1 : Hero de présentation --}}
    <x-sections.home.hero />

    {{-- Section 2 : Présentation de l'écosystème --}}
    <x-sections.home.presentation />

    {{-- Section 3 : Derniers podcasts --}}
    <x-sections.home.podcasts-grid />

    {{-- Section 4 : Expériences immersives --}}
    <x-sections.home.experiences-grid />

    {{-- Section 5 : FAQ réservation & participation --}}
    <x-sections.home.faq />

    {{-- Section 6 : Réseaux sociaux & communauté --}}
    <x-sections.home.socials />

    {{-- Section 7 : Contact & Demande --}}
    <x-sections.home.contact />

    {{-- Section 8 : Newsletter --}}
    <x-sections.home.newsletter />
@endsection
