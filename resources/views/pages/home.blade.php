@extends('layouts.page')

@section('title', 'Maison La Recette — Accueil')
@section('description', 'Des histoires de celles et ceux qui font la cuisine, et des expériences pour se rencontrer autour de la table.')

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
