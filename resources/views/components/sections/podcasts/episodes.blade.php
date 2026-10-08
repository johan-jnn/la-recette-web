@props([
    'perPage' => 6,
])

@php
    $sort = request('sort') === 'oldest' ? 'oldest' : 'latest';

    // Catalogue filtré par les paramètres GET de <x-podcasts.filters>
    $podcasts = \App\Models\Podcast::query()
        ->with('urls')
        ->when(request('q'), fn ($query, $search) => $query->where(fn ($query) => $query
            ->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")))
        ->when(request('duration'), fn ($query, $duration) => match ($duration) {
            'short' => $query->where('duration', '<', '00:30:00'),
            'medium' => $query->whereBetween('duration', ['00:30:00', '01:00:00']),
            'long' => $query->where('duration', '>', '01:00:00'),
            default => $query,
        })
        ->orderBy('publish_date', $sort === 'oldest' ? 'asc' : 'desc')
        ->paginate($perPage)
        ->withQueryString();
@endphp

<x-layout.section id="episodes">
    <x-ui.section-heading title="Tous les épisodes">
        <x-ui.sort-menu :options="['latest' => 'Les plus récents', 'oldest' => 'Les plus anciens']" />
    </x-ui.section-heading>

    <div data-reveal-stagger class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($podcasts as $podcast)
            <x-podcasts.episode-card :podcast="$podcast" />
        @empty
            <x-ui.empty-state>
                {{ request()->hasAny(['q', 'duration']) ? 'Aucun épisode ne correspond à votre recherche.' : 'Les premiers épisodes arrivent très bientôt.' }}
            </x-ui.empty-state>
        @endforelse
    </div>

    <x-ui.pagination :paginator="$podcasts" class="mt-12" />
</x-layout.section>
