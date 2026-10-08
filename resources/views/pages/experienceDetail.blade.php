@php
    $experience = \App\Models\Experience::query()->findOrFail($id);
@endphp

@extends('layouts.page')

@section('title', 'Maison La Recette — ' . $experience->title)
@section('description', \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($experience->presentation)), 155))

@push('main')
    <x-ui.page-hero
        :title="$experience->title"
        align="left"
        :back="['label' => 'Retour à toutes les expériences', 'url' => route('experiences.index')]"
    />

    <x-sections.experiences.detail :experience="$experience" />
    <x-sections.experiences.related-articles :experience="$experience" />
    <x-sections.home.faq />
@endpush
