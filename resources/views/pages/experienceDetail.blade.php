@php
    $experience = \App\Models\Experience::query()->findOrFail($id);
@endphp

@extends('layouts.page')

@section('title', 'Maison La Recette — ' . $experience->title)
@section('description', \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($experience->presentation)), 155))

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'Expériences', 'url' => route('experiences.index')], ['label' => $experience->title]]"
        :title="$experience->title"
    />

    <x-sections.experiences.detail :experience="$experience" />
    <x-sections.experiences.related-articles :experience="$experience" />
    <x-sections.home.faq />
@endpush
