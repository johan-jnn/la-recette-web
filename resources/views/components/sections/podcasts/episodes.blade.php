@props([
    'podcasts' => null,
])

@php
    $podcasts ??= \App\Models\Podcast::query()->with('urls')->latest('publish_date')->get();
@endphp

<x-layout.section id="episodes" bg="white">
    <x-ui.section-heading title="Tous les épisodes" />
    <x-podcasts.grid :podcasts="$podcasts" />
</x-layout.section>
