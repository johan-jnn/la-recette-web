@extends('layouts.page')

@section('title', 'Maison La Recette — Blog')
@section('description', 'Nos articles pour décrypter les enjeux et les solutions de nos assiettes.')

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'Blog']]"
        title="Suivez nos actualités"
        description="Des articles pour prolonger les rencontres du podcast et des expériences, et décrypter les enjeux et solutions de nos assiettes."
    />

    <x-sections.articles.latest />
@endpush
