@extends('layouts.page')

@section('title', 'Maison La Recette — Podcast')
@section('description', 'La recette donne la parole à des producteur·ices, chef·fes, artisan·es ou entrepreneur·ses engagé·es. Explorez les coulisses de nos assiettes et découvrez des initiatives inspirantes à travers des conversations et immersions au cœur de notre alimentation.')

@push('main')
    <x-sections.shared.hero-card
        title="Le podcast La recette"
        description="La recette donne la parole à des producteur·ices, chef·fes, artisan·es ou entrepreneur·ses engagé·es, pour explorer les coulisses de nos assiettes."
        bg="forest"
        tone="cream"
        padding="py-16 md:pt-[92px] md:pb-28"
    >
        <x-slot:decor>
            <x-ui.decor name="microphone" width="138" height="217" class="left-[85.2%] top-[57.3%] w-[138px] h-[217px] hidden lg:block" />
        </x-slot:decor>

        <x-ui.button url="#episodes">Écouter les épisodes</x-ui.button>
        <x-ui.button :url="route('studio')" variant="forest">Le studio</x-ui.button>
    </x-sections.shared.hero-card>

    <x-sections.home.listen variant="plain" />
    <x-podcasts.filters />
    <x-sections.podcasts.episodes />
    <x-sections.home.faq />
    <x-sections.home.cta bg="white" quote="Une idée d’épisode ou un projet de podcast ?" />
@endpush
