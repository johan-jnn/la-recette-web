@props([
    'podcasts' => null,
])

@php
    $podcasts ??= \App\Models\Podcast::query()->with('urls')->latest('publish_date')->get();
@endphp

<x-layout.section id="episodes" bg="muted">
    <x-ui.section-heading eyebrow="À écouter" title="Tous les épisodes" />
    <x-podcasts.grid :podcasts="$podcasts" />
</x-layout.section>
