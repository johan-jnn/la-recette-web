@props([
    'experience', // App\Models\Experience
])

@php
    // Requête directe : la relation Experience::articles() pointe sur de mauvaises clés
    $articles = \App\Models\Article::query()->where('experience_id', $experience->id)->latest()->get();
@endphp

@if ($articles->isNotEmpty())
    <x-layout.section bg="muted">
        <x-ui.section-heading eyebrow="Pour aller plus loin" title="Articles liés à cette expérience" />
        <x-articles.grid :articles="$articles" tone="white" />
    </x-layout.section>
@endif
