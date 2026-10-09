@extends('layouts.page')

@section('title', 'Maison La Recette — Blog')
@section('description', 'Nos articles pour décrypter les enjeux et les solutions de nos assiettes.')

@push('main')
    <x-sections.articles.featured />
    <x-sections.articles.latest />
    <x-sections.home.cta bg="white" quote="Une histoire à nous raconter ?" />
@endpush
