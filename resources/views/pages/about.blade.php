@extends('layouts.page')

@section('title', 'Maison La Recette — À propos')
@section('description', 'La mission de Maison la recette : accélérer la transition alimentaire, à travers un podcast, un studio de production et des expériences autour de l’alimentation durable.')

@push('main')
    <x-sections.shared.hero-card
        title="Agir avec sa fourchette"
        description="La mission de Maison la recette : accélérer la transition alimentaire, à travers un podcast, un studio de production et des expériences autour de l’alimentation durable."
    >
        <x-slot:decor>
            <x-ui.decor name="figure" width="450" height="400" color="cream" class="left-[76%] top-[17.7%] w-[450px] h-[400px] hidden lg:block" />
        </x-slot:decor>

        <x-ui.button :url="route('podcasts.index')" variant="cream">Écouter le podcast</x-ui.button>
        <x-ui.button :url="route('experiences.index')" variant="rose">Découvrir les expériences</x-ui.button>
    </x-sections.shared.hero-card>

    <x-sections.about.intro />
    <x-sections.about.values />
    <x-sections.about.founder />
    <x-sections.about.team />
    <x-sections.home.cta bg="white" quote="Entrez dans la conversation" />
@endpush
