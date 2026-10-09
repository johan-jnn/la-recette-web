@props([
    'article', // App\Models\Article courant (exclu de la liste)
    'limit' => 3,
])

@php
    $articles = \App\Models\Article::query()
        ->with('experience')
        ->whereKeyNot($article->getKey())
        ->latest()
        ->take($limit)
        ->get();
@endphp

@if ($articles->isNotEmpty())
    <x-layout.section>
        <x-ui.section-heading title="Pour prolonger la lecture">
            <x-ui.button :url="route('articles.index')" variant="forest">Tous les articles</x-ui.button>
        </x-ui.section-heading>

        <x-articles.grid :articles="$articles" button-variant="sage" />
    </x-layout.section>
@endif
