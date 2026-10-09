@props([
    'perPage' => 6,
    'description' => 'Rencontrez celles et ceux qui cultivent, cuisinent et transmettent : explorez tous les épisodes du podcast La recette.',
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

{{-- Catalogue des épisodes : cartes podcast, feuilles décoratives de part et d'autre --}}
<x-layout.section id="episodes" bg="white" class="overflow-hidden" padding="pt-16 md:pt-20 pb-16 md:pb-[72px]">
    <x-slot:decor>
        <x-ui.decor name="hero-leaf" width="568" height="804" color="sage" class="left-[-103px] top-[337px] w-[569px] h-[804px] hidden xl:block" />
        <x-ui.decor name="hero-leaf" width="568" height="804" color="sage" class="left-[973px] top-[1021px] w-[569px] h-[804px] hidden xl:block" />
    </x-slot:decor>

    <x-ui.section-heading title="Tous les épisodes" :description="$description">
        <x-ui.sort-menu :options="['latest' => 'Les plus récents', 'oldest' => 'Les plus anciens']" />
    </x-ui.section-heading>

    <div data-reveal-stagger class="grid grid-cols-1 sm:grid-cols-[repeat(auto-fill,320px)] justify-center gap-x-11 gap-y-[43px]">
        @forelse ($podcasts as $podcast)
            <x-podcasts.card :podcast="$podcast" full-button />
        @empty
            <x-ui.empty-state>
                {{ request()->hasAny(['q', 'duration']) ? 'Aucun épisode ne correspond à votre recherche.' : 'Les premiers épisodes arrivent très bientôt.' }}
            </x-ui.empty-state>
        @endforelse
    </div>

    <x-ui.pagination :paginator="$podcasts" class="mt-[43px]" />
</x-layout.section>
