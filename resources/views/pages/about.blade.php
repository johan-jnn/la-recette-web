@extends('layouts.page')

@section('title', 'Maison La Recette — À propos')
@section('description', 'Découvrez la vision, l’histoire et les valeurs fondatrices de Maison La Recette.')

@push('main')
    <x-ui.page-hero
        eyebrow="Notre Histoire"
        title="La cuisine, un patrimoine vivant qui se partage"
        description="Maison La Recette est née d’une conviction simple : derrière chaque plat se cache une voix, un geste, un terroir qui méritent d’être racontés et vécus ensemble."
    />

    <x-sections.about.story />
    <x-sections.about.values />
    <x-sections.home.socials />
@endpush
