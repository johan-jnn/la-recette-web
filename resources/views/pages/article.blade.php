@extends('layouts.page')

@section('title', 'Maison La Recette — Podcast & Articles')
@section('description', 'Retrouvez tous les épisodes du podcast Maison La Recette ainsi que nos articles et réflexions autour de la cuisine, des terroirs et des rencontres.')

@push('main')
    <x-ui.page-hero
        eyebrow="À écouter & à lire"
        title="Podcast & Articles"
        description="Des conversations profondes avec celles et ceux qui font la cuisine, et des ressources pour approfondir vos connaissances culinaires."
    />

    <x-sections.podcasts.subscribe />
    <x-sections.podcasts.episodes />
    <x-sections.articles.latest />
@endpush
