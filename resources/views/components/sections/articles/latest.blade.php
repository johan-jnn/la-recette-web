@props([
    'articles' => null,
])

@php
    $articles ??= \App\Models\Article::query()->latest()->get();
@endphp

@if ($articles->isNotEmpty())
    <x-layout.section id="articles">
        <x-ui.section-heading eyebrow="À lire" title="Nos articles & ressources" />
        <x-articles.grid :articles="$articles" />
    </x-layout.section>
@endif
