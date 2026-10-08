@props([
    'articles' => null,
])

@php
    $articles ??= \App\Models\Article::query()->with('experience')->latest()->get();
@endphp

<x-layout.section id="articles">
    <x-ui.section-heading title="Suivez nos actualités" />
    <x-articles.grid :articles="$articles" />
</x-layout.section>
