@extends('layouts.page')

@section('title', 'Maison La Recette — ' . $article->title)
@section('description', \Illuminate\Support\Str::limit($article->description ?: html_entity_decode(strip_tags($article->body)), 155))

@push('main')
    <x-ui.page-hero
        :breadcrumb="[['label' => 'Blog', 'url' => route('articles.index')], ['label' => $article->title]]"
        :title="$article->title"
    >
        <p class="text-sm leading-[1.55] text-muted">
            Publié le {{ $article->created_at?->translatedFormat('d F Y') }}
            @if ($article->experience)
                · <a href="{{ route('experiences.show', ['id' => $article->experience->id]) }}" class="underline underline-offset-4 hover:text-sage">{{ $article->experience->title }}</a>
            @endif
        </p>
    </x-ui.page-hero>

    <x-sections.articles.detail :article="$article" />
    <x-sections.articles.related-experience :experience="$article->experience" />
    <x-sections.articles.more :article="$article" />
@endpush
