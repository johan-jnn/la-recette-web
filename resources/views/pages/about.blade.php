@extends('layouts.page')

@section('title', 'Maison La Recette — À propos')
@section('description', 'Maison la recette explore les liens entre cuisine, transmission et rencontre, à travers un podcast et des expériences à partager.')

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'À propos']]"
        title="Derrière chaque recette, une histoire"
        description="Maison la recette explore les liens entre cuisine, transmission et rencontre, à travers un podcast et des expériences à partager."
    />

    <x-sections.about.intro />
    <x-sections.about.values />
    <x-sections.about.founder />
    <x-sections.about.team />

    <x-sections.shared.call-to-action
        title="Entrez dans la conversation"
        description="Découvrez un parcours à écouter ou un moment à vivre."
        layout="stacked"
    >
        <x-ui.button :url="route('podcasts.index')">Écouter le podcast</x-ui.button>
        <x-ui.button :url="route('experiences.index')" variant="outline">Découvrir les expériences</x-ui.button>
    </x-sections.shared.call-to-action>
@endpush
