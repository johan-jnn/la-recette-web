@extends('layouts.page')

@section('title', 'Maison La Recette — Blog')
@section('description', 'Nos articles et ressources autour de la cuisine, des terroirs et des rencontres.')

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'Blog']]"
        title="Suivez nos actualités"
        description="Des articles et des ressources pour prolonger les rencontres du podcast et des expériences."
    />

    <x-sections.articles.latest />
@endpush
