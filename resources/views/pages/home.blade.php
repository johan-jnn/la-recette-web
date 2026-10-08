@extends('layouts.page')

@section('title', 'Maison La Recette — Accueil')
@section('description', 'La recette part à la rencontre des artisan·es, chef·fes et producteur·trices qui façonnent l’alimentation de demain, pour décrypter les enjeux et les solutions de nos assiettes.')

@push('main')
    <x-sections.home.hero />
    <x-sections.home.trust />
    <x-sections.home.listen />
    <x-sections.home.presentation />
    <x-sections.home.podcasts-grid />
    <x-sections.home.experiences-grid />
    <x-sections.home.offers />
    <x-sections.home.news />
    <x-sections.home.faq />
    <x-sections.home.cta />
@endpush
