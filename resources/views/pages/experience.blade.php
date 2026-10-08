@extends('layouts.page')

@section('title', 'Maison La Recette — Toutes les expériences')
@section('description', 'Réservez des ateliers pratiques, dégustations sensorielles et tables partagées.')

@push('main')
    <x-ui.page-hero
        eyebrow="Nos Formats"
        title="Toutes les expériences"
        description="Participez à des moments conviviaux pensés pour goûter, apprendre et échanger autour du goût."
    />

    <x-sections.experiences.list />
    <x-sections.home.faq />
    <x-sections.home.newsletter />
@endpush
