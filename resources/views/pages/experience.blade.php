@extends('layouts.page')

@section('title', 'Maison La Recette — Expériences')
@section('description', 'Ateliers, food tours et immersions co-construits avec des chef·fes, artisan·es et producteur·trices engagé·es, pour découvrir, cuisiner et apprendre ensemble.')

@push('main')
    <x-sections.experiences.intro />
    <x-sections.experiences.showcase />
    <x-sections.experiences.contact />
    <x-sections.home.faq />
    <x-sections.home.cta />
@endpush
