@extends('layouts.page')

@section('title', 'Maison La Recette — À propos')
@section('description', 'La mission de Maison la recette : accélérer la transition alimentaire, à travers un podcast, un studio de production et des expériences autour de l’alimentation durable.')

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'À propos']]"
        title="Agir avec sa fourchette"
        description="La mission de Maison la recette : accélérer la transition alimentaire, à travers un podcast, un studio de production et des expériences autour de l’alimentation durable."
    />

    <x-sections.about.intro />
    <x-sections.about.values />
    <x-sections.about.founder />
    <x-sections.about.team />

    <x-sections.shared.call-to-action
        title="Entrez dans la conversation"
        description="Écoutez les acteur·ices du changement ou vivez une expérience pour explorer les coulisses de nos assiettes."
        layout="stacked"
    >
        <x-ui.button :url="route('podcasts.index')">Écouter le podcast</x-ui.button>
        <x-ui.button :url="route('experiences.index')" variant="outline">Découvrir les expériences</x-ui.button>
    </x-sections.shared.call-to-action>
@endpush
