@extends('layouts.page')

@section('title', 'Maison La Recette — Expériences')
@section('description', 'Ateliers, rencontres et tables partagées : découvrez des moments à vivre pour goûter, apprendre et échanger.')

@push('main')
    <x-sections.experiences.intro />
    <x-sections.experiences.showcase />
    <x-sections.experiences.contact />
    <x-sections.home.faq />
    <x-sections.home.cta />
@endpush
