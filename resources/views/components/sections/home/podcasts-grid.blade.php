@props([
    'podcasts' => null,
    'limit' => 6,
])

@php
    $podcasts ??= \App\Models\Podcast::query()->with('urls')->latest('publish_date')->take($limit)->get();
@endphp

<x-layout.section id="podcasts" bg="muted" class="overflow-hidden">
    @if ($podcasts->isEmpty())
        <x-ui.section-heading eyebrow="À écouter" title="Les derniers épisodes du Podcast" />
        <x-ui.empty-state message="Les premiers épisodes arrivent très bientôt." />
    @else
        <x-ui.carousel :count="$podcasts->count()">
            <x-slot:header>
                <x-ui.section-heading eyebrow="À écouter" title="Les derniers épisodes du Podcast" spacing="mb-10">
                    <x-ui.button :url="route('articles.index') . '#episodes'" variant="pill">
                        Tous les épisodes ↗
                    </x-ui.button>
                    <x-ui.carousel-controls class="ml-2" />
                </x-ui.section-heading>
            </x-slot:header>

            @foreach ($podcasts as $podcast)
                <x-ui.carousel-item>
                    <x-podcasts.card :podcast="$podcast" image-class="h-44" class="w-full" />
                </x-ui.carousel-item>
            @endforeach
        </x-ui.carousel>
    @endif
</x-layout.section>
