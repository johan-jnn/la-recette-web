@extends('layouts.page')

@section('title', 'Maison La Recette — Podcast & Articles')
@section('description', 'Retrouvez tous les épisodes du podcast Maison La Recette ainsi que nos articles et réflexions autour de la cuisine, des terroirs et des rencontres.')

@push('main')
    <x-ui.page-hero
        eyebrow="À écouter & à lire"
        title="Podcast & Articles"
        description="Des conversations profondes avec celles et ceux qui font la cuisine, et des ressources pour approfondir vos connaissances culinaires."
    >
        <x-podcasts.platform-links />
    </x-ui.page-hero>

    <x-sections.podcasts.episodes />
    <x-sections.podcasts.subscribe />
    <x-sections.articles.latest />
    <x-sections.home.newsletter />
@endpush
