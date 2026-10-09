@extends('layouts.page')

@section('title', 'Maison La Recette — ' . $article->title)
@section('description', \Illuminate\Support\Str::limit($article->description ?: html_entity_decode(strip_tags($article->body)), 155))

@push('main')
    <x-sections.articles.detail :article="$article" />
    <x-sections.articles.related-experience :experience="$article->experience" />
    <x-sections.articles.more :article="$article" />
@endpush
