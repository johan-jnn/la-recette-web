@props([
    'articles' => null,
    'limit' => 3,
])

@php
    $articles ??= \App\Models\Article::query()->with('experience')->latest()->take($limit)->get();
@endphp

<x-layout.section id="actualites">
    <x-ui.section-heading title="Suivez nos actualités">
        <x-ui.button :url="route('articles.index')" variant="outline">Toutes les actualités</x-ui.button>
    </x-ui.section-heading>

    <x-articles.grid :articles="$articles" />
</x-layout.section>
