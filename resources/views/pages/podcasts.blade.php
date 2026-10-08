@extends('layouts.page')

@section('title', 'Maison La Recette — Podcast')
@section('description', 'La recette donne la parole à des producteur·ices, chef·fes, artisan·es ou entrepreneur·ses engagé·es. Explorez les coulisses de nos assiettes et découvrez des initiatives inspirantes à travers des conversations et immersions au cœur de notre alimentation.')

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'Podcast']]"
        title="Le podcast La recette"
        description="La recette donne la parole à des producteur·ices, chef·fes, artisan·es ou entrepreneur·ses engagé·es. Explorez les coulisses de nos assiettes et découvrez des initiatives inspirantes à travers des conversations et immersions au cœur de notre alimentation."
    />

    <x-podcasts.filters />
    <x-sections.podcasts.episodes />
    <x-sections.home.listen />
@endpush
