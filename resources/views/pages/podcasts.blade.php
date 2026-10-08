@extends('layouts.page')

@section('title', 'Maison La Recette — Podcast')
@section('description', 'Rencontrez celles et ceux qui cultivent, cuisinent et transmettent. Explorez tous les épisodes du podcast Maison la recette.')

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'Podcast']]"
        title="Les histoires derrière les recettes"
        description="Rencontrez celles et ceux qui cultivent, cuisinent et transmettent. Explorez tous les épisodes du podcast Maison la recette."
    />

    <x-podcasts.filters />
    <x-sections.podcasts.episodes />
    <x-sections.home.listen />
@endpush
